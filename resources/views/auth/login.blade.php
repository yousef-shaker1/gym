<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-commerce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('{{ URL::asset('assets/img/pngtree-young-strong-bodybuilder-showing-hiis-muscular-torso-image_15667577.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.5); /* Set transparency here */
            padding: 84px;
    border-radius: 42px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 379px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container button {
            background-color: #4e0efd;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .login-container button:hover {
            background-color: #0051ff;
        }
        .login-container a {
            color: #4e0efd;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }
        .login-container a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            background-color: #f8d7da;
            border: 1px solid #f5c2c7;
            padding: 10px;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 14px;
        }
    </style>
    @livewireStyles
</head>
<body>
    @livewire('Login')
    @livewireScripts
</body>
</html>
