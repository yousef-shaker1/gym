@extends('layouts.master_admin')
@section('css')

@endsection

@section('title')

@endsection

@section('content')

<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h3> Show User</h3>
      </div>
      <div class="pull-right">
          <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
      </div>
  </div>
</div>


<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Name:</strong>
          {{ $user->name }}
      </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Email:</strong>
          {{ $user->email }}
      </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Roles:</strong>
          @if(!empty($user->getRoleNames()))
              @foreach($user->getRoleNames() as $v)
                  <label class="badge badge-success">{{ $v }}</label>
              @endforeach
          @endif
      </div>
  </div>
</div>


@endsection

@section('js')

@endsection