<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            padding-bottom: 20px;
        }
        .email-header h1 {
            color: #2c3e50;
        }
        .email-content {
            font-size: 16px;
            line-height: 1.5;
            background-color: green;
        }
        .email-content p {
            margin: 0 0 20px;
        }
        .email-button {
            display: inline-block;
            padding: 12px 24px;
            margin: 20px 0;
            font-size: 16px;
            color: #ffffff;
            background-color: #3498db;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
        }
        .email-footer {
            font-size: 14px;
            color: #888888;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Email Confirmate</h1>
        </div>
        <div class="email-content">
            <p>Hi thank's,</p>
            <p>Thank you for register!.</p>
            
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Quadro Societário de Empresas. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
