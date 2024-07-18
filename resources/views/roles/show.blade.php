@extends('layouts.master_admin')
@section('css')

@endsection

@section('title')

@endsection

@section('content')

<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h3> Show Role</h3>
      </div>
      <div class="pull-right">
          <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
      </div>
  </div>
</div>


<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Name:</strong>
          {{ $role->name }}
      </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Permissions:</strong>
          @if(!empty($rolePermissions))
              @foreach($rolePermissions as $v)
                  <label class="label label-success">{{ $v->name }},</label>
              @endforeach
          @endif
      </div>
  </div>
</div>


@endsection

@section('js')

@endsection