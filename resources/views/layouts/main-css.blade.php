<title>@yield('title')</title>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

<!-- Css Styles -->
<link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('assets/css/font-awesome.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('assets/css/flaticon.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('assets/css/owl.carousel.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('assets/css/barfiller.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('assets/css/magnific-popup.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('assets/css/slicknav.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}" type="text/css">

<style>
  .to-social a:hover,
    .to-social a:focus,
    .to-social a:active {
        color: rgba(255, 166, 0, 0.87); /* اللون البرتقالي عند التفاعل */
    }
    .logout-link {
            font-size: 100px;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        .logout-link:hover {
          color: rgba(255, 166, 0, 0.87);
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

        .navbar-custom {
        background-color: #343a40;
    }

    .navbar-custom .navbar-brand,
    .navbar-custom .nav-link {
        color: #ffffff;
    }

    .navbar-custom .nav-link:hover {
        color: #d4d4d4;
    }
    .custom-alert {
max-width: 100%; 
margin: 0 auto; 
}
</style>
@yield('css')
