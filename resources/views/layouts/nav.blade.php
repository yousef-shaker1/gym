
    <!-- Header Section Begin -->
    <header class="header-section">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-3">
                  <div class="logo">
                      <a href="./index.html">
                          <img src="{{ URL::asset('assets/img/logo.png') }}" alt="">
                      </a>
                  </div>
              </div>
              <div class="col-lg-6">
                  <nav class="nav-menu">
                      <ul>
                          <li class="active"><a href="{{ route('home') }}">Home</a></li>
                          <li><a href="{{ route('aboutus') }}">About Us</a></li>
                          <li><a href="{{ route('class_details') }}">Classes</a></li>
                          <li><a href="{{ route('services') }}">Services</a></li>
                          <li><a href="{{ route('team') }}">Our Team</a></li>
                          <li><a href="#">Pages</a>
                              <ul class="dropdown">
                                  <li><a href="{{ route('calculator') }}">Bmi calculate</a></li>
                                  <li><a href="{{ route('blog') }}">Our blog</a></li>
                              </ul>
                          </li>
                          <li><a href="{{ route('contact') }}">Contact</a></li>
                      </ul>
                  </nav>
              </div>
              <div class="col-lg-3">
                  <div class="top-option">
                      <div class="to-social">
                        @if(!Auth::user())
                          <a href="{{ route('login') }}">login</a>
                          <a href="{{ route('register') }}">register</a>
                        @else
                        <a href="{{ route('logout') }}" class="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ Auth::user()->name }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endif
                      </div>
                  </div>
              </div>
          </div>
          <div class="canvas-open">
              <i class="fa fa-bars"></i>
          </div>
      </div>
  </header>
  <!-- Header End -->