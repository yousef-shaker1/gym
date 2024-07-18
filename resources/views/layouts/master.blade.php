@include('layouts.header')
  @include('layouts.main-css')
</head>

<body>
  <div id="preloder">
    <div class="loader"></div>
  </div>
  @include('layouts.nav')

  
    @yield('content')


@include('layouts.main-script')
@include('layouts.footer')