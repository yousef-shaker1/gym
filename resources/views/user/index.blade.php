@extends('layouts.master')

@section('title')
home page
@endsection

@section('css')

@endsection


@section('content')

<!-- Hero Section Begin -->
<section class="hero-section">
  <div class="hs-slider owl-carousel">
      <div class="hs-item set-bg" data-setbg="{{ URL::asset('assets/img/hero/hero-1.jpg') }}">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6 offset-lg-6">
                      <div class="hi-text">
                          <span>Shape your body</span>
                          <h1>Be <strong>strong</strong> traning hard</h1>
                          <a href="#" class="primary-btn">Get info</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="hs-item set-bg" data-setbg="{{ URL::asset('assets/img/hero/hero-2.jpg') }}">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6 offset-lg-6">
                      <div class="hi-text">
                          <span>Shape your body</span>
                          <h1>Be <strong>strong</strong> traning hard</h1>
                          <a href="#" class="primary-btn">Get info</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Hero Section End -->

<!-- ChoseUs Section Begin -->
<section class="choseus-section spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="section-title">
                  <span>Why chose us?</span>
                  <h2>PUSH YOUR LIMITS FORWARD</h2>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-3 col-sm-6">
              <div class="cs-item">
                  <span class="flaticon-034-stationary-bike"></span>
                  <h4>Modern equipment</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                      dolore facilisis.</p>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="cs-item">
                  <span class="flaticon-033-juice"></span>
                  <h4>Healthy nutrition plan</h4>
                  <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                      facilisis.</p>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="cs-item">
                  <span class="flaticon-002-dumbell"></span>
                  <h4>Proffesponal training plan</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                      dolore facilisis.</p>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="cs-item">
                  <span class="flaticon-014-heart-beat"></span>
                  <h4>Unique to your needs</h4>
                  <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                      facilisis.</p>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- ChoseUs Section End -->

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

<!-- ChoseUs Section End -->

<!-- Banner Section Begin -->
<section class="banner-section set-bg" data-setbg="{{ URL::asset('assets/img/banner-bg.jpg') }}">
  <div class="container">
      <div class="row">
          <div class="col-lg-12 text-center">
              <div class="bs-text">
                  <h2>registration now to get more deals</h2>
                  <div class="bt-tips">Where health, beauty and fitness meet.</div>
                  <a href="#" class="primary-btn  btn-normal">Appointment</a>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Banner Section End -->

<!-- Gallery Section Begin -->
    <div class="gallery-section" style="margin-bottom: 0; padding-bottom: 0;">
        <div class="gallery">
          <div class="grid-sizer"></div>
          @foreach ($photos as $photo)   
            <div class="gs-item">
              <a href="{{ Storage::url($photo->img) }}" class="image-popup">
                <img src="{{ Storage::url($photo->img) }}" alt="Gallery Image" class="gallery-img">
              </a>
            </div>
          @endforeach
        </div>
      </div>
<!-- Gallery Section End -->

<!-- Team Section Begin -->
<section class="team-section spad" style="margin-top: 0; padding-top: 0;">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="team-title">
                  <div class="section-title">
                      <span>Our Team</span>
                      <h2>TRAIN WITH EXPERTS</h2>
                  </div>
                  <a href="#" class="primary-btn btn-normal appoinment-btn">appointment</a>
              </div>
          </div>
      </div>
      <div class="row">
        <div class="ts-slider owl-carousel">
            @foreach($teams as $team)
            <div class="col-lg-4">
                <div class="ts-item set-bg" data-setbg="{{ Storage::url($team->img) }}">
                    <div class="ts_text">
                        <h4>{{ $team->name }}</h4>
                        <span>{{ $team->age }} years</span>
                        <span>{{ $team->section->name }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
  </div>
</section>
<!-- Team Section End -->

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