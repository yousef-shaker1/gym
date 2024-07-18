@extends('layouts.master_admin')
@section('css')

    <style>
        .navbar-custom {
            background-color: #343a40;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff;
        }

        .navbar-custom .nav-link:hover {
            color: #d4d4d4;
        }
    </style>
    @livewireStyles
@endsection

@section('title')
    الفريق 
@endsection

@section('content')
        @livewire('img')
  </div>
  </div>
    @livewireScripts
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        window.addEventListener('close-modal', event => {
            $('#addimg').modal('hide');
            $('#updateimgModal').modal('hide');
            $('#deleteImgModal').modal('hide');
        });
    </script>

@endsection