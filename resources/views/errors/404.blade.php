@extends('layouts.master')

@section('title')
404
@endsection

@section('css')

@endsection

@section('content')
<!-- 404 Section Begin -->
<section class="section-404">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="text-404">
                  <h1>404</h1>
                  <h3>Opps! This page Could Not Be Found!</h3>
                  <p>Sorry bit the page you are looking for does not exist, have been removed or name changed</p>
                  <a href="{{ route('home') }}"><i class="fa fa-home"></i> Go back home</a>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection

@section('js')

@endsection