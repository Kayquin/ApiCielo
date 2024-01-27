<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
</head>
<body>
    <h1>Payment Success</h1>
    <p>Payment ID: {{ $payment->tid }}</p>
    <p>Proof of Sale: {{ $payment->proofOfSale }}</p>
    <p>Authorization Code: {{ $payment->authorizationCode }}</p>
    <p>Return Code: {{ $payment->returnCode }}</p>
    <p>Return Message: {{ $payment->returnMessage }}</p>
</body>
</html>