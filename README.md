<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Introdução

A API Cielo 3.0 é uma poderosa interface de programação de aplicativos desenvolvida pela Cielo para facilitar a integração de serviços de pagamento em plataformas web. Esta documentação fornece informações detalhadas sobre os recursos disponíveis, endpoints, parâmetros e exemplos de uso.

## Ambiente

A API Cielo 3.0 suporta dois ambientes: sandbox e produção. O ambiente de sandbox é utilizado para testes e desenvolvimento, enquanto o ambiente de produção é destinado a transações reais. Certifique-se de utilizar as credenciais corretas para cada ambiente.
<br>
Mais informações: https://developercielo.github.io/manual/cielo-ecommerce

## Installation
Para executar  o projeto, é necessário ter o PHP e o Composer instalados em sua máquina. Após a instalação do composer, basta rodar os comandos:
```
composer install
```
Manualmente, vá no composer.json e adicione as seguintes linhas:
```
"require": {
    "filipegar/cielo-api-3.0-php": "^1.0",
}
```
Este é um dropin replacement package para a dependencia do composer developercielo/api-3.0-php.
<br>
<br>
Dê start no Apache do Xampp e pronto.<br>
Vá no seu navegador e digite http://localhost/ApiCielo/public/

## Integração API e-commerce Cielo
```
FINAL DO CARTÃO	        STATUS DA TRANSAÇÃO	    CÓDIGO DE RETORNO	    MENSAGEM DE RETORNO
XXXX.XXXX.XXXX.XXX0
XXXX.XXXX.XXXX.XXX1
XXXX.XXXX.XXXX.XXX4	    Autorizado	                4/6	                   Operação realizada com sucesso
XXXX.XXXX.XXXX.XXX2	    Não Autorizado	            05	                   Não Autorizada
XXXX.XXXX.XXXX.XXX3	    Não Autorizado	            57	                   Cartão Expirado
XXXX.XXXX.XXXX.XXX5	    Não Autorizado	            78	                   Cartão Bloqueado
XXXX.XXXX.XXXX.XXX6	    Não Autorizado	            99	                   Time Out
XXXX.XXXX.XXXX.XXX7 	Não Autorizado	            77	                   Cartão Cancelado
XXXX.XXXX.XXXX.XXX8	    Não Autorizado	            70	                   Problemas com o Cartão de Crédito
XXXX.XXXX.XXXX.XXX9	    Autorização Aleatória	    4 a 99	               Operation Successful / Time Out
```
## Autenticação

A autenticação na API Cielo 3.0 é feita por meio de credenciais específicas para cada ambiente. As credenciais incluem o Merchant ID e a Merchant Key.<br>
Configurações do .env:
```
Merchant ID: seu_merchant_id
Merchant Key: sua_merchant_key
```
<br>
Pegue seu ID e Key aqui: https://cadastrosandbox.cieloecommerce.cielo.com.br/?culture=en-US
<br>

## Possiveis Problemas
PHP: Vá na pasta do seu PHP, abra o php.ini e faça as seguintes alterações:
```
;extension=ldap
extension=curl
;extension=ffi
;extension=ftp
extension=fileinfo
;extension=gd
extension=gettext
;extension=gmp
;extension=intl
;extension=imap
extension=mbstring
extension=exif
extension=mysqli
;extension=oci8_12c
;extension=oci8_19
;extension=odbc
;extension=openssl
;extension=pdo_firebird
extension=pdo_mysql
;extension=pdo_oci
;extension=pdo_odbc
;extension=pdo_pgsql
extension=pdo_sqlite
;extension=pgsql
;extension=shmop
;extension=soap
;extension=sockets
;extension=sodium
;extension=sqlite3
;extension=tidy
;extension=xsl
extension=zip
```