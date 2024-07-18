<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('{{ URL::asset('assets/img/thumb-bodybuilding-gym-athlete-bodybuilder-biceps.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Changed from 120vh */
            margin: 0;
        }
        .register-container {
            background: rgba(255, 255, 255, 0.5);
            padding: 84px;
            border-radius: 42px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 379px;
            text-align: center;
        }
        .register-container h2 {
            margin-bottom: 20px;
        }
        .register-container input[type="text"],
        .register-container input[type="email"],
        .register-container input[type="password"],
        .register-container input[type="tel"],
        .register-container input[type="date"],
        .register-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .register-container button {
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
        .register-container button:hover {
            background-color: #0051ff;
        }

        .register-container {
            /* تغيير العرض والارتفاع */
            width: 550px;
            padding: 64px; /* تغيير الهوامش الداخلية */
        }
        .register-container a {
            color: #4e0efd;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }
        .register-container a:hover {
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
    @livewire('register')
    @livewireScripts
</body>
</html>
