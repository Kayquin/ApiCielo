<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cielo\API30\Merchant;

use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\Payment;
use Cielo\API30\Ecommerce\CreditCard;

use Cielo\API30\Ecommerce\Request\CieloRequestException;
class CieloController extends Controller
{
    private $environment;
    private $merchant;
    private $cielo;
    private $sale;
    private $payment;

    public function __construct(Request $request){
        $this->environment = Environment::sandbox();
        $this->merchant = new Merchant(config('cielo.MerchantId'), config('cielo.MerchantKey'));
        $this->cielo = new CieloEcommerce($this->merchant, $this->environment);
        $this->sale = new Sale('123');
        $this->payment = Payment::PAYMENTTYPE_CREDITCARD;
    }


    public function peyer(Request $request){
        //Método peyer para passar a variável holder para a visualização:
        $holder = $request->input('holder');
        
        // Crie uma instância de Customer informando o nome do cliente
        $this->sale->customer($request->holder);

        // Crie uma instância de Payment informando o valor do pagamento
        $this->paymentInit($request->price);

        // Crie uma instância de Credit Card utilizando os dados de teste
        // esses dados estão disponíveis no manual de integração
        $this->cardData($request->price,$request->cvv,$request->date,$request->numberCard,$request->holder);

        // Crie o pagamento na Cielo
        try {
            if (!$this->cielo) {
                throw new \Exception('Cielo object is not initialized');
            }
            // Configure o SDK com seu merchant e o ambiente apropriado para criar a venda
            $payment = $this->createSale();
            $total = $request->price;
            $paymentTid = $this->getPaymentTid($payment);
        return view('success', ['payment' => $payment, 'paymentTid' => $paymentTid, 'holder' => $holder]);
        } catch (CieloRequestException $e) {
            // Em caso de erros de integração, podemos tratar o erro aqui.
            // os códigos de erro estão todos disponíveis no manual de integração.
            $error = $e->getCieloError();
            $errorCode = $error->getCode();
            $errorMessage = $error->getMessage();
            if ($errorCode == 308) {
                $errorMessage = "Payment not available to capture";
            }
            return view('error', ['errorCode' => $errorCode, 'errorMessage' => $errorMessage,'holder' => $holder]);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('error', ['errorCode' => 999, 'errorMessage' => $errorMessage,'holder' => $holder]);
        }    
        
    }
    //Método público para retornar a propriedade tid
    public function getPaymentTid($payment)
    {
        return $payment->getPayment()->getPaymentId();
    }

    private function createSale(){
        return ($this->cielo)->createSale($this->sale);
    }

    private function captureSale($price){
        $paymentId = $this->paymentId();
        $payment = $this->cielo->getPayment($paymentId);
        $paymentStatus = $payment->getPayment()->getStatus();
    
        if ($paymentStatus == Payment::STATUS_AUTHORIZED || $paymentStatus == Payment::STATUS_PARTIALLY_CAPTURED) {
            return ($this->cielo)->captureSale($paymentId, $price, 0);
        } else {
            throw new \Exception('Payment not available to capture');
        }
    }

    private function cancelSale($price){
        return ($this->cielo)->cancelSale($this->paymentId(), $price);
    }

    private function paymentInit($price){
        return $this->sale->payment($price);
    }

    private function paymentId(){
        return $this->createSale()->getPayment()->getPaymentId();
    }

    private function cardData($price,$cvv,$date,$numberCard,$holder){
        $this->paymentInit($price)->setType($this->payment)
                ->creditCard($cvv, CreditCard::VISA)
                ->setExpirationDate($date)
                ->setCardNumber($numberCard)
                ->setHolder($holder);
    }
}
