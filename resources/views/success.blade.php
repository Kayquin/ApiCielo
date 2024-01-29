<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Payment</h1>
    <p>Name: {{ $holder }}</p>
    <p>Payment ID: {{ $paymentTid }}</p>
    <p>Proof of Sale: {{ $payment->getPayment()->getProofOfSale() }}</p>
    <p>Authorization Code: {{ $payment->getPayment()->getAuthorizationCode() }}</p>
    <p>Return Code: {{ $payment->getPayment()->getReturnCode() }}</p>
    <p>Return Message: {{ $payment->getPayment()->getReturnMessage() }}</p>
</body>
<div>
<a href='http://localhost/ApiCielo/public/'><button>Voltar</button></a>
    </div>
</html>