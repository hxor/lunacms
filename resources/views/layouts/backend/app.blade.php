<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="{{ asset('back/images/favicon_1.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LunaCMS') }}</title>


				<link href="{{ asset('back/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
                <link href="{{ asset('back/css/core.css') }}" rel="stylesheet" type="text/css" />
                <link href="{{ asset('back/css/components.css') }}" rel="stylesheet" type="text/css" />
                <link href="{{ asset('back/css/icons.css') }}" rel="stylesheet" type="text/css" />
                <link href="{{ asset('back/css/pages.css') }}" rel="stylesheet" type="text/css" />
                <link href="{{ asset('back/css/responsive.css') }}" rel="stylesheet" type="text/css" />

				@yield('styles')

				<link href="{{ asset('back/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css"/>

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}"></script>
        <![endif]-->

        <script src="{{ asset('back/js/modernizr.min.js') }}"></script>

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>

	</head>

	<body class="fixed-left">

		<!-- Begin page -->
		<div id="wrapper">

      <!-- Top Bar Start -->
      @include('layouts.backend.partials._topbar')
      <!-- Top Bar End -->


      <!-- ========== Left Sidebar Start ========== -->
      @include('layouts.backend.partials._left-sidebar')
			<!-- Left Sidebar End -->

			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="content-page">
				<!-- Start content -->
				<div class="content">
            @yield('content')
        </div> <!-- content -->

        <footer class="footer">
            © 2016. All rights reserved.
        </footer>

      </div>
      <!-- ============================================================== -->
      <!-- End Right content here -->
      <!-- ============================================================== -->



    </div>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{ asset('back/js/jquery.min.js') }}"></script>
    <script src="{{ asset('back/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('back/js/detect.js') }}"></script>
    <script src="{{ asset('back/js/fastclick.js') }}"></script>
    <script src="{{ asset('back/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('back/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('back/js/waves.js') }}"></script>
    <script src="{{ asset('back/js/wow.min.js') }}"></script>
    <script src="{{ asset('back/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('back/js/jquery.scrollTo.min.js') }}"></script>

    <script src="{{ asset('back/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>    
    <script src="{{ asset('back/pages/jquery.dashboard_3.js') }}"></script>

    <script src="{{ asset('back/plugins/sweetalert/sweetalert.min.js') }}"></script>

    <script src="{{ asset('back/js/jquery.core.js') }}"></script>
    <script src="{{ asset('back/js/jquery.app.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

		@yield('scripts')

		@if (notify()->ready())
			 <script>
					 swal({
							 title: "{!! notify()->message() !!}",
							 text: "{!! notify()->option('text') !!}",
							 type: "{{ notify()->type() }}",
							 @if (notify()->option('timer'))
							 timer: {{ notify()->option('timer') }}
							 @endif
					 });
			 </script>
	 @endif

</body>
</html>
