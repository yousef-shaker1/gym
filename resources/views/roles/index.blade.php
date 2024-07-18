@extends('layouts.master_admin')
@section('css')

@endsection

@section('title')
roles
@endsection

@section('content')

<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h3>Role Management</h3>
      </div>
      <div class="pull-right">
      @can('اضافة صلاحية')
          <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
          @endcan
      </div>
  </div>
</div>


@if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif


<table class="table table-bordered">
<tr>
   <th>No</th>
   <th>Name</th>
   <th width="280px">Action</th>
</tr>
  @foreach ($roles as $key => $role)
  <tr>
      <td>{{ $i++ }}</td>
      <td>{{ $role->name }}</td>
      <td>
          @can('صلاحيات المستخدمين')
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
          @endcan
          @can('تعديل صلاحية')
          <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
          @endcan
          @can('حذف صلاحية')
          @if ($role->name !== 'owner')
              {{ Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
              {{ Form::close() }}
          @endif
          @endcan
      </td>
  </tr>
  @endforeach
</table>


{{ $roles->render() }}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>



@endsection

@section('js')

@endsection