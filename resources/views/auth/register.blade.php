<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="{{ asset('back/images/favicon_1.ico') }}">

		<title>Register | LunaCMS</title>

		<link href="{{ asset('back/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('back/css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('back/css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('back/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('back/css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('back/css/responsive.css') }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}"></script>
        <![endif]-->

        <script src="{{ asset('back/js/modernizr.min.js') }}"></script>

	</head>
	<body>

		<div class="account-pages"></div>
		<div class="clearfix"></div>
		<div class="wrapper-page">
			<div class=" card-box">
				<div class="panel-heading">
					<h3 class="text-center"> Sign Up to <strong class="text-custom">LunaCMS</strong> </h3>
				</div>

				<div class="panel-body">

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nama" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
            </div>


						<div class="form-group">
							<div class="col-xs-12">
								<div class="checkbox checkbox-primary">
									<input id="checkbox-signup" type="checkbox" checked="checked">
									<label for="checkbox-signup">I accept <a href="#">Terms and Conditions</a></label>
								</div>
							</div>
						</div>

						<div class="form-group text-center m-t-40">
							<div class="col-xs-12">
								<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">
									Register
								</button>
							</div>
						</div>

						<div class="form-group m-t-20 m-b-0">
							<div class="col-sm-12 text-center">
								<h4><b>Sign Up with</b></h4>
							</div>
						</div>

						<div class="form-group m-b-0 text-center">
							<div class="col-sm-12">
								<button type="button" class="btn btn-facebook waves-effect waves-light m-t-20">
                   <i class="fa fa-facebook m-r-5"></i> Facebook
                </button>

                <button type="button" class="btn btn-twitter waves-effect waves-light m-t-20">
                   <i class="fa fa-twitter m-r-5"></i> Twitter
                </button>

                <button type="button" class="btn btn-googleplus waves-effect waves-light m-t-20">
                   <i class="fa fa-google-plus m-r-5"></i> Google+
                </button>
							</div>
						</div>


					</form>

				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 text-center">
					<p>
						Already have account?<a href="{{ url('/login') }}" class="text-primary m-l-5"><b>Sign In</b></a>
					</p>
				</div>
			</div>

		</div>

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


        <script src="{{ asset('back/js/jquery.core.js') }}"></script>
        <script src="{{ asset('back/js/jquery.app.js') }}"></script>

	</body>
</html>
