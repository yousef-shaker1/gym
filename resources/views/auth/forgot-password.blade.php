<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - E-commerce</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('{{ URL::asset('assets/img/pngtree-fitness-and-bodybuilding-workout-picture-image_2478708.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .forgot-container {
            background: rgba(255, 255, 255, 0.5); /* Set transparency here */
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 546px;
            text-align: center;
        }
        .forgot-container h2 {
            margin-bottom: 20px;
        }
        .forgot-container .btn-primary {
            background-color: #4e0efd;
            border-color: #4e0efd;
            transition: background-color 0.3s ease;
        }
        .forgot-container .btn-primary:hover {
            background-color: #0051ff;
            border-color: #0051ff;
        }
        .forgot-container a {
            color: #4e0efd;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }
        .forgot-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="forgot-container">
        <h2>Forgot Password</h2>
        {{-- <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div> --}}
        
        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Email Password Reset Link') }}
            </button>
        </form>
        <a href="{{ route('login') }}">Back to Login</a>
    </div>
</body>
</html>
