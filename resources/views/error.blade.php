<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Error</title>
</head>
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
<body>
    <h1>Payment Error</h1>
    <p>Name: {{ $holder }}</p>
    <p>Error Code: {{ $errorCode }}</p>
    <p>Error Message: {{ $errorMessage }}</p>
</body>
<div>
<button onclick="history.go(-1);">Voltar</button>
    </div>
</html>