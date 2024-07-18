@extends('layouts.master')

@section('title')
services
@endsection

@section('css')

@endsection

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ URL::asset('assets/img/breadcrumb-bg.jpg') }}">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <div class="breadcrumb-text">
                      <h2>Services</h2>
                      <div class="bt-option">
                          <a href="./index.html">Home</a>
                          <span>Services</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Services Section Begin -->
  <section class="services-section spad">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="section-title">
                      <span>What we do?</span>
                      <h2>PUSH YOUR LIMITS FORWARD</h2>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-3 order-lg-1 col-md-6 p-0">
                  <div class="ss-pic">
                      <img src="{{ URL::asset('assets/img/services/services-1.jpg') }}" alt="">
                  </div>
              </div>
              <div class="col-lg-3 order-lg-2 col-md-6 p-0">
                  <div class="ss-text">
                      <h4>Personal training</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut dolore
                          facilisis.</p>
                      <a href="#">Explore</a>
                  </div>
              </div>
              <div class="col-lg-3 order-lg-3 col-md-6 p-0">
                  <div class="ss-pic">
                      <img src="{{ URL::asset('assets/img/services/services-2.jpg') }}" alt="">
                  </div>
              </div>
              <div class="col-lg-3 order-lg-4 col-md-6 p-0">
                  <div class="ss-text">
                      <h4>Group fitness classes</h4>
                      <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus.</p>
                      <a href="#">Explore</a>
                  </div>
              </div>
              <div class="col-lg-3 order-lg-8 col-md-6 p-0">
                  <div class="ss-pic">
                      <img src="{{ URL::asset('assets/img/services/services-3.jpg') }}" alt="">
                  </div>
              </div>
              <div class="col-lg-3 order-lg-7 col-md-6 p-0">
                  <div class="ss-text second-row">
                      <h4>Body building</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut dolore
                          facilisis.</p>
                      <a href="#">Explore</a>
                  </div>
              </div>
              <div class="col-lg-3 order-lg-6 col-md-6 p-0">
                  <div class="ss-pic">
                      <img src="{{ URL::asset('assets/img/services/services-3.jpg') }}" alt="">
                  </div>
              </div>
              <div class="col-lg-3 order-lg-5 col-md-6 p-0">
                  <div class="ss-text second-row">
                      <h4>Strength training</h4>
                      <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus.</p>
                      <a href="#">Explore</a>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Services Section End -->

  
<!-- Classes Section Begin -->
<section class="classes-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Our Classes</span>
                    <h2>WHAT WE CAN OFFER</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($sections as $section)
            <div class="col-lg-4 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <a href="{{ Storage::url($section->img) }}"><img src="{{ Storage::url($section->img) }}" alt="{{ $section->name }}"></a>
                    </div>
                    <div class="ci-text">
                        <h5>{{ $section->name }}</h5>
                        <a href="{{ route('show_section', $section->id) }}"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

  <!-- Banner Section Begin -->
  <section class="banner-section set-bg" data-setbg="{{ URL::asset('assets/img/banner-bg.jpg') }}">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <div class="bs-text service-banner">
                      <h2>Exercise until the body obeys.</h2>
                      <div class="bt-tips">Where health, beauty and fitness meet.</div>
                      <a href="https://www.youtube.com/watch?v=EzKkl64rRbM" class="play-btn video-popup"><i
                              class="fa fa-caret-right"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Banner Section End -->


  <!-- Get In Touch Section Begin -->
  <div class="gettouch-section">
      <div class="container">
          <div class="row">
              <div class="col-md-4">
                  <div class="gt-text">
                      <i class="fa fa-map-marker"></i>
                      <p>333 Middle Winchendon Rd, Rindge,<br/> NH 03461</p>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="gt-text">
                      <i class="fa fa-mobile"></i>
                      <ul>
                          <li>125-711-811</li>
                          <li>125-668-886</li>
                      </ul>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="gt-text email">
                      <i class="fa fa-envelope"></i>
                      <p>Support.gymcenter@gmail.com</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Get In Touch Section End -->

@endsection

@section('js')

@endsection