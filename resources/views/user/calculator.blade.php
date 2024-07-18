@extends('layouts.master')

@section('title')
calculator
@endsection

@section('css')
<style>
    .custom-select-black {
    background-color: black;
    color: white;
    border: 1px solid #ccc;
}

.custom-select-black option {
    background-color: black;
    color: white;
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
                  <h2>BMI calculator</h2>
                  <div class="bt-option">
                      <a href="./index.html">Home</a>
                      <a href="#">Pages</a>
                      <span>BMI calculator</span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- BMI Calculator Section Begin -->
<section class="bmi-calculator-section spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-6">
              <div class="section-title chart-title">
                  <span>check your body</span>
                  <h2>BMI CALCULATOR CHART</h2>
              </div>
              <div class="chart-table">
                  <table>
                      <thead>
                          <tr>
                              <th>Bmi</th>
                              <th>WEIGHT STATUS</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td class="point">Below 18.5</td>
                              <td>Underweight</td>
                          </tr>
                          <tr>
                              <td class="point">18.5 - 24.9</td>
                              <td>Healthy</td>
                          </tr>
                          <tr>
                              <td class="point">25.0 - 29.9</td>
                              <td>Overweight</td>
                          </tr>
                          <tr>
                              <td class="point">30.0 - and Above</td>
                              <td>Obese</td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="section-title chart-calculate-title">
                  <span>check your body</span>
                  <h2>Calculate your daily calories</h2>
              </div>
              @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
              <div class="chart-calculate-form">
                  <p>You can now calculate your daily calories by specifying your height, weight, age, and gender</p>
                      <form action="{{ route('bmr') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="number" name="height" placeholder="Height / cm" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" name="weight" placeholder="Weight / kg" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" name="age" placeholder="Age" required>
                            </div>
                            <div class="col-sm-6 mb-3" style="margin-top: -26px;">
                                <div class="form-group">
                                    <label for="sex">Sex</label>
                                    <select name="sex" id="sex" class="form-control custom-select-black" required>
                                        <option value="" disabled selected>Select your sex</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-12">
                                <button type="submit">Calculate</button>
                            </div>
                        </div>
                    </form>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- BMI Calculator Section End -->

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