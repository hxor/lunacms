@extends('layouts.backend.app')

@section('content')
<div class="container">

      @include('layouts.backend.partials._bread', ['data' => empty($bread) ? '' : $bread])

      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-color panel-inverse">
            <div class="panel-heading">
              <h3 class="panel-title">Dashboard</h3>
            </div>
            <div class="panel-body">
              <p>
                You are logged in!
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->
</div>
@endsection
