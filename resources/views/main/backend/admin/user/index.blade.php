@extends('layouts.backend.app')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('back/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection


@section('content')
  <div class="container">

        @include('layouts.backend.partials._bread', ['data' => empty($bread) ? '' : $bread])

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title"><b>Users</b></h4>
                    <p> <a class="btn btn-default" href="{{ route('admin.user.create') }}">Add New</a> </p>
                    {!! $html->table(['class'=>'table table-bordered table-striped']) !!}
                </div>
            </div>
        </div>
        <!-- end row -->
  </div>
@endsection

@section('scripts')
    <script src="{{ asset('back/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    {!! $html->scripts() !!}
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').dataTable();
        });
    </script>
@endsection
