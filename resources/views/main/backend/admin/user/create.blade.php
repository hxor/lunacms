@extends('layouts.backend.app')

@section('styles')

@endsection


@section('content')
  <div class="container">

        @include('layouts.backend.partials._bread', ['data' => empty($bread) ? '' : $bread])

        <div class="row">
          <div class="col-lg-9 col-md-8">
            <div class="card-box">
              <h4 class="m-t-0 header-title"><b>Add Users</b></h4>

              {!! Form::open(['method' => 'POST', 'route' => 'admin.user.store', 'class' => 'data-parsley-validate novalidate', 'files' => true]) !!}

                  @include('main.backend.admin.user._form')

              {!! Form::close() !!}

            </div>
          </div>
        </div>
        <!-- end row -->
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
  <script type="text/javascript">
      $(document).ready(function(){

         $('#lfm').filemanager('image');

      });
  </script>
@endsection
