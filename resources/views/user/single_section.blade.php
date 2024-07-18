@extends('layouts.master')

@section('title')
{{ $section->name }}
@endsection

@section('css')
<style>
    .primary-btn {
    background-color: #007bff; /* لون خلفية الزرار */
    color: #fff; /* لون النص داخل الزرار */
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    display: inline-block;
    transition: background-color 0.3s ease; /* تحريك التغيرات التدريجية في الخلفية */
}

.primary-btn:hover {
    background-color: #0056b3; /* لون الخلفية عند تحويل الماوس */
}

.input-wrapper {
    margin-bottom: 10px; /* إضافة هامش سفلي لحقل الإدخال */
}

.label-white {
    color: #fff; /* تغيير لون الوسم إلى أبيض */
    display: block; /* جعل الوسم عنصراً بلوك لضمان عرض كامل */
    margin-bottom: 5px; /* تعديل الهامش السفلي للوسم */
}

.form-control {
    width: 100%;
    padding: 0.5rem;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>
@endsection

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ URL::asset('assets/img/breadcrumb-bg.jpg') }}">
  <div class="container">
      <div class="row">
          <div class="col-lg-12 text-center">
              <div class="breadcrumb-text">
                  <h2>{{ $section->name }}</h2>
                  <div class="bt-option">
                      <a href="./index.html">Home</a>
                      <span>Services</span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<!-- Class Timetable Section Begin -->
<section class="class-timetable-section class-details-timetable spad">
  <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>Classes timetable</h2>
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
                            $activity = $time->where('day_id', $day->id)->where('time', $timeSlot)->first();
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


<!-- Breadcrumb Section End -->
<section class="pricing-section service-pricing spad">
    <section class="pricing-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Choose your pricing plan</h2>
                    </div>
                </div>
            </div>
            @if (session()->has('Add'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('Add') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class='alert alert-danger'>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                @endforeach
                            </div>
                        @endif
            <div class="row">
                
                @foreach ($raleoffers as $raleoffer)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="ps-item">
                        <h3>{{ $raleoffer->offer->subscription }}</h3>
                        <div class="pi-price">
                            <h2>{{ $raleoffer->price }} $</h2>
                            <span>SINGLE CLASS</span>
                        </div>
                        <ul>
                            <li>Unlimited equipment</li> <!-- corrected "equipments" to "equipment" -->
                            <li>Personal trainer</li>
                            <li>Month to month</li> <!-- corrected "mouth" to "month" -->
                            <li>No time restriction</li>
                        </ul>
                        <form action="{{ route('payment', $raleoffer->section->id) }}" method="POST"> <!-- replace route('subscribe') with your actual subscription route -->
                            @csrf
                            <input type="hidden" name="rale_offer" value="{{ $raleoffer->id }}">
                            <label for="start_date" class="label-white">Subscription start date</label>
                            <input type="date" name="date" id='start_date' class="form-control">
                            <br>
                            <button type="submit" class="primary-btn pricing-btn">Subscribe Now</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
  @endsection

@section('js')
<script src="https://checkout.stripe.com/checkout.js"></script>

@endsection