@extends('layouts.master')

@section('title')
blog
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
                  <h2>Our Blog</h2>
                  <div class="bt-option">
                      <a href="./index.html">Home</a>
                      <a href="#">Pages</a>
                      <span>Blog</span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog-section spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-8 p-0">
              <div class="blog-item">
                  <div class="bi-pic">
                      <img src="{{ URL::asset('assets/img/blog/blog-1.jpg') }}" alt="">
                  </div>
                  <div class="bi-text">
                      <h5><a href="./blog-details.html">Vegan White Peach Mug Cobbler With Cardam Vegan White Peach Mug
                              Cobbler...</a></h5>
                      <ul>
                          <li>by Admin</li>
                          <li>Aug,15, 2019</li>
                          <li>20 Comment</li>
                      </ul>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut
                          labore et dolore magna aliqua accumsan lacus facilisis.</p>
                  </div>
              </div>
              <div class="blog-item">
                  <div class="bi-pic">
                      <img src="{{ URL::asset('assets/img/blog/blog-2.jpg') }}" alt="">
                  </div>
                  <div class="bi-text">
                      <h5><a href="./blog-details.html">Vegan White Peach Mug Cobbler With Cardam Vegan White Peach Mug
                              Cobbler...</a></h5>
                      <ul>
                          <li>by Admin</li>
                          <li>Aug,15, 2019</li>
                          <li>20 Comment</li>
                      </ul>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut
                          labore et dolore magna aliqua accumsan lacus facilisis.</p>
                  </div>
              </div>
              <div class="blog-item">
                  <div class="bi-pic">
                      <img src="{{ URL::asset('assets/img/blog/blog-3.jpg') }}" alt="">
                  </div>
                  <div class="bi-text">
                      <h5><a href="./blog-details.html">Vegan White Peach Mug Cobbler With Cardam Vegan White Peach Mug
                              Cobbler...</a></h5>
                      <ul>
                          <li>by Admin</li>
                          <li>Aug,15, 2019</li>
                          <li>20 Comment</li>
                      </ul>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut
                          labore et dolore magna aliqua accumsan lacus facilisis.</p>
                  </div>
              </div>
              <div class="blog-item">
                  <div class="bi-pic">
                      <img src="{{ URL::asset('assets/img/blog/blog-4.jpg') }}" alt="">
                  </div>
                  <div class="bi-text">
                      <h5><a href="./blog-details.html">Vegan White Peach Mug Cobbler With Cardam Vegan White Peach Mug
                              Cobbler...</a></h5>
                      <ul>
                          <li>by Admin</li>
                          <li>Aug,15, 2019</li>
                          <li>20 Comment</li>
                      </ul>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut
                          labore et dolore magna aliqua accumsan lacus facilisis.</p>
                  </div>
              </div>
              <div class="blog-item">
                  <div class="bi-pic">
                      <img src="{{ URL::asset('assets/img/blog/blog-5.jpg') }}" alt="">
                  </div>
                  <div class="bi-text">
                      <h5><a href="./blog-details.html">Vegan White Peach Mug Cobbler With Cardam Vegan White Peach Mug
                              Cobbler...</a></h5>
                      <ul>
                          <li>by Admin</li>
                          <li>Aug,15, 2019</li>
                          <li>20 Comment</li>
                      </ul>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut
                          labore et dolore magna aliqua accumsan lacus facilisis.</p>
                  </div>
              </div>
              <div class="blog-pagination">
                  <a href="#">1</a>
                  <a href="#">2</a>
                  <a href="#">3</a>
                  <a href="#">Next</a>
              </div>
          </div>
          <div class="col-lg-4 col-md-8 p-0">
              <div class="sidebar-option">
                  <div class="so-categories">
                    <h5 class="title">Categories</h5>
                    @foreach ($sections as $section)
                    <ul>
                        <li><a href="{{ route('show_section', $section->id) }}">{{ $section->name }}</a></li>
                      </ul>
                      @endforeach
                  </div>
                  <div class="so-latest">
                      <h5 class="title">Feature posts</h5>
                      <div class="latest-large set-bg" data-setbg="{{ URL::asset('assets/img/letest-blog/latest-1.jpg') }}">
                          <div class="ll-text">
                              <h5><a href="./blog-details.html">This Japanese Way of Making Iced Coffee Is a Game...</a></h5>
                              <ul>
                                  <li>Aug 20, 2019</li>
                                  <li>20 Comment</li>
                              </ul>
                          </div>
                      </div>
                      <div class="latest-item">
                          <div class="li-pic">
                              <img src="{{ URL::asset('assets/img/letest-blog/latest-2.jpg') }}" alt="">
                          </div>
                          <div class="li-text">
                              <h6><a href="./blog-details.html">Grilled Potato and Green Bean Salad</a></h6>
                              <span class="li-time">Aug 15, 2019</span>
                          </div>
                      </div>
                      <div class="latest-item">
                          <div class="li-pic">
                              <img src="{{ URL::asset('assets/img/letest-blog/latest-3.jpg') }}" alt="">
                          </div>
                          <div class="li-text">
                              <h6><a href="./blog-details.html">The $8 French Rosé I Buy in Bulk Every Summer</a></h6>
                              <span class="li-time">Aug 15, 2019</span>
                          </div>
                      </div>
                      <div class="latest-item">
                          <div class="li-pic">
                              <img src="{{ URL::asset('assets/img/letest-blog/latest-4.jpg') }}" alt="">
                          </div>
                          <div class="li-text">
                              <h6><a href="./blog-details.html">Ina Garten's Skillet-Roasted Lemon Chicken</a></h6>
                              <span class="li-time">Aug 15, 2019</span>
                          </div>
                      </div>
                      <div class="latest-item">
                          <div class="li-pic">
                              <img src="{{ URL::asset('assets/img/letest-blog/latest-5.jpg') }}" alt="">
                          </div>
                          <div class="li-text">
                              <h6><a href="./blog-details.html">The Best Weeknight Baked Potatoes, 3 Creative Ways</a></h6>
                              <span class="li-time">Aug 15, 2019</span>
                          </div>
                      </div>
                  </div>
                  <div class="so-tags">
                      <h5 class="title">Popular tags</h5>
                      <a href="#">Gyming</a>
                      <a href="#">Body buidling</a>
                      <a href="#">Yoga</a>
                      <a href="#">Weightloss</a>
                      <a href="#">Proffeponal</a>
                      <a href="#">Streching</a>
                      <a href="#">Cardio</a>
                      <a href="#">Karate</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Blog Section End -->

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