@extends('layouts.master')

@section('title')
class-details
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
                  <h2>Classes detail</h2>
                  <div class="bt-option">
                      <a href="./index.html">Home</a>
                      <a href="#">Classes</a>
                      <span>Body building</span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Class Details Section Begin -->
<section class="class-details-section spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-8">
              <div class="class-details-text">
                  <div class="cd-pic">
                      <img src="{{ URL::asset('assets/img/classes/class-details/class-detailsl.jpg') }}" alt="">
                  </div>
                  <div class="cd-text">
                      <div class="cd-single-item">
                          <h3>Body buiding</h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                              incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                              exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                              irure Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                              tempor incididunt ut labore et dolore magna aliqua accusantium doloremque
                              laudantium. Excepteur sint occaecat cupidatat non proident sculpa.</p>
                      </div>
                      <div class="cd-single-item">
                          <h3>Trainer</h3>
                          <p>Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                              labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                              ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                              reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur officia
                              deserunt mollit.</p>
                      </div>
                  </div>
                  
              </div>
          </div>
          <div class="col-lg-4 col-md-8">
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
                      <h5 class="title">Latest posts</h5>
                      <div class="latest-large set-bg" data-setbg="{{ URL::asset('assets/img/letest-blog/latest-1.jpg') }}">
                          <div class="ll-text">
                              <h5><a href="#">This Japanese Way of Making Iced Coffee Is a Game...</a></h5>
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
                              <h6><a href="#">Grilled Potato and Green Bean Salad</a></h6>
                              <span class="li-time">Aug 15, 2019</span>
                          </div>
                      </div>
                      <div class="latest-item">
                          <div class="li-pic">
                              <img src="{{ URL::asset('assets/img/letest-blog/latest-3.jpg') }}" alt="">
                          </div>
                          <div class="li-text">
                              <h6><a href="#">The $8 French Rosé I Buy in Bulk Every Summer</a></h6>
                              <span class="li-time">Aug 15, 2019</span>
                          </div>
                      </div>
                      <div class="latest-item">
                          <div class="li-pic">
                              <img src="{{ URL::asset('assets/img/letest-blog/latest-4.jpg') }}" alt="">
                          </div>
                          <div class="li-text">
                              <h6><a href="#">Ina Garten's Skillet-Roasted Lemon Chicken</a></h6>
                              <span class="li-time">Aug 15, 2019</span>
                          </div>
                      </div>
                      <div class="latest-item">
                          <div class="li-pic">
                              <img src="{{ URL::asset('assets/img/letest-blog/latest-5.jpg') }}" alt="">
                          </div>
                          <div class="li-text">
                              <h6><a href="#">The Best Weeknight Baked Potatoes, 3 Creative Ways</a></h6>
                              <span class="li-time">Aug 15, 2019</span>
                          </div>
                      </div>
                  </div>
                 
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Class Details Section End -->

<!-- Class Timetable Section Begin -->
<section class="class-timetable-section class-details-timetable spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="class-details-timetable_title">
                  <h5>Classes timetable</h5>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
              <div class="class-timetable details-timetable">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            @foreach ($days as $day)
                                <th>{{ $day->day }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // Define the time slots
                        $timeSlots = [
                            '06:00:00' => '6.00am - 8.00am',
                            '08:00:00' => '8.00am - 10.00am',
                            '10:00:00' => '10.00am - 12.00pm',
                            '12:00:00' => '12.00pm - 2.00pm',
                            '14:00:00' => '2.00pm - 4.00pm',
                            '16:00:00' => '4.00pm - 6.00pm',
                            '18:00:00' => '6.00pm - 8.00pm',
                            '20:00:00' => '8.00pm - 10.00pm',
                            '22:00:00' => '10.00pm - 12.00am',
                            '00:00:00' => '12.00am - 2.00am',
                        ];
                        @endphp
                
                @foreach ($timeSlots as $timeSlot => $timeRange)
                <tr>
                    <td class="class-time">{{ $timeRange }}</td>
                    @foreach ($days as $day)
                        @php
                            $activity = $times->where('day_id', $day->id)->where('time', $timeSlot)->first();
                        @endphp
                        <td class="{{ $activity ? 'dark-bg hover-dp ts-meta' : 'blank-td' }}" data-tsmeta="{{ $activity ? 'activity' : '' }}">
                            @if ($activity)
                                <h5>{{ $activity->section->name }}</h5>
                                @foreach ($caption->where('section_id', $activity->section->id) as $team)
                                    <h5>{{ $team->name }}</h5>
                                @endforeach
                                <span>{{ $activity->instructor_name }}</span>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
                    </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Class Timetable Section End -->

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


<!-- Search model end -->
@endsection

@section('js')

@endsection