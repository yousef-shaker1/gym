@extends('layouts.master_admin')
@section('css')

@endsection

@section('title')

@endsection

@section('content')


<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h3>Edit Role</h3>
      </div>
      <div class="pull-right">
          <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
      </div>
  </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
      </ul>
  </div>
@endif



{{ Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) }}
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    <div class="form-group">
                        <p>اسم الصلاحية :</p>
                        {{ Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) }}
                    </div>
                </div>
                <div class="row">
                    <!-- col -->
                    <div class="col-lg-4">
                        <ul id="treeview1">
                            <li><a href="#">الصلاحيات</a>
                                <ul>
                                    <li>
                                        @foreach($permission as $value)
                                            <input type='checkbox' name='permission[]'  value="{{ $value->name }}" {{ in_array($value->id, $rolePermissions) ? 'checked' : ''}}>
                                            {{ $value->name }}
                                        <br />
                                        @endforeach
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-main-primary">تحديث</button>
                    </div>
                    <!-- /col -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
{{ Form::close() }}

@endsection

@section('js')

@endsection