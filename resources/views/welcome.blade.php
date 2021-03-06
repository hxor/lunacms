<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="front/images/favicon.ico">

        <title>Home Page | LunaCMS</title>

        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

        <!-- Bootstrap core CSS -->
        <link href="front/css/bootstrap.min.css" rel="stylesheet">

        <!-- Owl Carousel CSS -->
        <link href="front/css/owl.carousel.css" rel="stylesheet">
        <link href="front/css/owl.theme.default.min.css" rel="stylesheet">

        <!-- Icon CSS -->
        <link href="front/css/font-awesome.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="front/css/style.css" rel="stylesheet">



        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="front/js/html5shiv.js"></script>
          <script src="front/js/respond.min.js"></script>
        <![endif]-->

    </head>


    <body data-spy="scroll" data-target="#navbar-menu">

        <!-- Navbar -->
        <div class="navbar navbar-custom sticky navbar-fixed-top" role="navigation" id="sticky-nav">
            <div class="container">

                <!-- Navbar-header -->
                <div class="navbar-header">

                    <!-- Responsive menu button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- LOGO -->
                    <a class="navbar-brand logo" href="index.html">
                        Luna<span class="text-custom">C</span>MS
                    </a>

                </div>
                <!-- end navbar-header -->

                <!-- menu -->
                <div class="navbar-collapse collapse" id="navbar-menu">

                    <!-- Navbar right -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="#home" class="nav-link">Home</a>
                        </li>
                        <li>
                            <a href="#features" class="nav-link">Features</a>
                        </li>
                        <li>
                            <a href="#pricing" class="nav-link">Plans</a>
                        </li>
                        <li>
                            <a href="#clients" class="nav-link">Clients</a>
                        </li>
                        @if (Auth::guest())
                          <li>
                              <a href="{{ url('/login') }}">Login</a>
                          </li>
                          <li>
                              <a href="{{ url('/register') }}">Register</a>
                          </li>
                        @else
                          <li>
                              <a href="{{ url('/logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                          @endif
                        <li>
                            <a href="" class="btn btn-white-bordered navbar-btn">Try for Free</a>
                        </li>
                    </ul>

                </div>
                <!--/Menu -->
            </div>
            <!-- end container -->
        </div>
        <!-- End navbar-custom -->



        <!-- HOME -->
        <section class="home bg-img-1" id="home">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="home-fullscreen">
                            <div class="full-screen">
                                <div class="home-wrapper home-wrapper-alt">
                                    <h2 class="font-light text-white">LunaCMS is simple CMS project made with Laravel PHP Framework</h2>
                                    <h4 class="text-white">Integrated "Ubold" a fully featured premium admin template built on top of awesome Bootstrap 3.3.7, modern web technology HTML5, CSS3 and jQuery. It has many ready to use hand crafted components. </h4>
                                    <a href="http://themeforest.net/item/ubold-responsive-web-app-kit/13489470?ref=coderthemes" target="_blank" class="btn btn-custom">Check This Out!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END HOME -->


        <!-- Features -->
        <section class="section" id="features">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3 class="title">The theme is fully responsive and easy to customize</h3>
                        <p class="text-muted sub-title">The clean and well commented code allows easy customization of the theme.It's <br/> designed for describing your app, agency or business.</p>
                    </div>
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-sm-4">
                        <div class="features-box">
                            <i class="fa fa-diamond"></i>
                            <h4>Responsive Layouts</h4>
                            <p class="text-muted">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="features-box">
                            <i class="fa fa-bicycle"></i>
                            <h4>Bootstrap UI based</h4>
                            <p class="text-muted">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin litera..</p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="features-box">
                            <i class="fa fa-signal"></i>
                            <h4>Creative Design</h4>
                            <p class="text-muted">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                        </div>
                    </div>

                </div> <!-- end row -->

            </div> <!-- end container -->
        </section>
        <!-- end Features -->



        <!-- Features Alt -->
        <section class="section p-t-0">
            <div class="container">

                <div class="row">
                    <div class="col-sm-5">
                        <div class="feat-description m-t-20">
                            <h4>Praesent et viverra massa non varius magna eget nibh vitae velit posuere efficitur.</h4>
                            <p class="text-muted">Ubold is a fully featured premium admin template built on top of awesome Bootstrap 3.3.7, modern web technology HTML5, CSS3 and jQuery. It has many ready to use hand crafted components. The theme is fully responsive and easy to customize. The code is super easy to understand and gives power to any developer to turn this theme into real web application. </p>

                            <a href="" class="btn btn-custom">Learn More</a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-sm-offset-1">
                        <img src="front/images/mac_1.png" alt="img" class="img-responsive m-t-20">
                    </div>

                </div><!-- end row -->

            </div> <!-- end container -->
        </section>
        <!-- end features alt -->


        <!-- Features Alt -->
        <section class="section">
            <div class="container">

                <div class="row">
                    <div class="col-sm-6">
                        <img src="front/images/mac_2.png" alt="img" class="img-responsive">
                    </div>

                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="feat-description">
                            <h4>Praesent et viverra massa non varius magna eget nibh vitae velit posuere efficitur.</h4>
                            <p class="text-muted">Ubold is a fully featured premium admin template built on top of awesome Bootstrap 3.3.7, modern web technology HTML5, CSS3 and jQuery. It has many ready to use hand crafted components. The theme is fully responsive and easy to customize. The code is super easy to understand and gives power to any developer to turn this theme into real web application. </p>

                            <a href="" class="btn btn-custom">Learn More</a>
                        </div>
                    </div>

                </div><!-- end row -->

            </div> <!-- end container -->
        </section>
        <!-- end features alt -->


        <!-- Features Alt -->
        <section class="section">
            <div class="container">

                <div class="row">
                    <div class="col-sm-5">
                        <div class="feat-description">
                            <h4>Praesent et viverra massa non varius magna eget nibh vitae velit posuere efficitur.</h4>
                            <p class="text-muted">Ubold is a fully featured premium admin template built on top of awesome Bootstrap 3.3.7, modern web technology HTML5, CSS3 and jQuery. It has many ready to use hand crafted components. The theme is fully responsive and easy to customize. The code is super easy to understand and gives power to any developer to turn this theme into real web application. </p>

                            <a href="" class="btn btn-custom">Learn More</a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-sm-offset-1">
                        <img src="front/images/mac_3.png" alt="img" class="img-responsive">
                    </div>

                </div><!-- end row -->

            </div> <!-- end container -->
        </section>
        <!-- end features alt -->


        <!-- Testimonials section -->
        <section class="section bg-img-1">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <div class="owl-carousel text-center">
                            <div class="item">
                                <div class="testimonial-box">
                                    <h4>Excellent support for a tricky issue related to our customization of the template. Author kept us updated as he made progress on the issue and emailed us a patch when he was done.</h4>
                                    <img src="front/images/user.jpg" class="testi-user img-circle" alt="testimonials-user">
                                    <p>- Ubold User</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-box">
                                    <h4>Flexible, Everything is in, Suuuuuper light, even for the code is much easier to cut and make it a theme for a productive app..</h4>
                                    <img src="front/images/user2.jpg" class="testi-user img-circle" alt="testimonials-user">
                                    <p>- Ubold User</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-box">
                                    <h4>Not only the code, design and support are awesome, but they also update it constantly the template with new content, new plugins. I will buy surely another coderthemes template!</h4>
                                    <img src="front/images/user3.jpg" class="testi-user img-circle" alt="testimonials-user">
                                    <p>- Ubold User</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Testimonials section -->


        <!-- PRICING -->
        <section class="section" id="pricing">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3 class="title">Pricing</h3>
                        <p class="text-muted sub-title">The clean and well commented code allows easy customization of the theme.It's <br> designed for describing your app, agency or business.</p>
                    </div>
                </div> <!-- end row -->


                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="row">

                            <!--Pricing Column-->
                            <article class="pricing-column col-lg-4 col-md-4">
                                <div class="inner-box">
                                    <div class="plan-header text-center">
                                        <h3 class="plan-title">Ragular</h3>
                                        <h2 class="plan-price">$24</h2>
                                        <div class="plan-duration">Per License</div>
                                    </div>
                                    <ul class="plan-stats list-unstyled">
                                        <li> <i class="pe-7s-server"></i>Number of end products <b>1</b></li>
                                        <li> <i class="pe-7s-graph"></i>Customer support</li>
                                        <li> <i class="pe-7s-mail-open"></i>Free Updates</li>
                                        <li> <i class="pe-7s-tools"></i>24x7 Support</li>
                                    </ul>

                                    <div class="text-center">
                                        <a href="#" class="btn btn-sm btn-custom">Purchase Now</a>
                                    </div>
                                </div>
                            </article>


                            <!--Pricing Column-->
                            <article class="pricing-column col-lg-4 col-md-4">
                                <div class="inner-box active">
                                    <div class="plan-header text-center">
                                        <h3 class="plan-title">Multiple</h3>
                                        <h2 class="plan-price">$120</h2>
                                        <div class="plan-duration">Per License</div>
                                    </div>
                                    <ul class="plan-stats list-unstyled">
                                        <li> <i class="pe-7s-server"></i>Number of end products <b>1</b></li>
                                        <li> <i class="pe-7s-graph"></i>Customer support</li>
                                        <li> <i class="pe-7s-mail-open"></i>Free Updates</li>
                                        <li> <i class="pe-7s-tools"></i>24x7 Support</li>
                                    </ul>

                                    <div class="text-center">
                                        <a href="#" class="btn btn-sm btn-custom">Purchase Now</a>
                                    </div>
                                </div>
                            </article>


                            <!--Pricing Column-->
                            <article class="pricing-column col-lg-4 col-md-4">
                                <div class="inner-box">
                                    <div class="plan-header text-center">
                                        <h3 class="plan-title">Extended</h3>
                                        <h2 class="plan-price">$999</h2>
                                        <div class="plan-duration">Per License</div>
                                    </div>
                                    <ul class="plan-stats list-unstyled">
                                        <li> <i class="pe-7s-server"></i>Number of end products <b>1</b></li>
                                        <li> <i class="pe-7s-graph"></i>Customer support</li>
                                        <li> <i class="pe-7s-mail-open"></i>Free Updates</li>
                                        <li> <i class="pe-7s-tools"></i>24x7 Support</li>
                                    </ul>

                                    <div class="text-center">
                                        <a href="#" class="btn btn-sm btn-custom">Purchase Now</a>
                                    </div>
                                </div>
                            </article>

                        </div>
                    </div><!-- end col -->
                </div>
                 <!-- end row -->

            </div> <!-- end container -->
        </section>
        <!-- End Pricing -->


        <!-- Clients -->
        <section class="section p-t-0" id="clients">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3 class="title">Trusted by Thousands</h3>
                        <p class="text-muted sub-title">The clean and well commented code allows easy customization of the theme.It's <br/> designed for describing your app, agency or business.</p>
                    </div>
                </div>
                <!-- end row -->

                <div class="row text-center">
                    <div class="col-sm-12">
                        <ul class="list-inline client-list">
                            <li><a href="" title="Microsoft"><img src="front/images/clients/microsoft.png" alt="clients"></a></li>
                            <li><a href="" title="Google"><img src="front/images/clients/google.png" alt="clients"></a></li>
                            <li><a href="" title="Instagram"><img src="front/images/clients/instagram.png" alt="clients"></a></li>
                            <li><a href="" title="Converse"><img src="front/images/clients/converse.png" alt="clients"></a></li>
                        </ul>
                    </div> <!-- end Col -->

                </div><!-- end row -->

            </div>
        </section>
        <!--End  Clients -->


        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <a class="navbar-brand logo" href="index.html">
                            UB<span class="text-custom">o</span>ld
                        </a>
                    </div>
                    <div class="col-lg-4 col-lg-offset-3 col-md-7">
                        <ul class="nav navbar-nav">
                            <li><a href="#">How it works</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Pricing</a></li>
                            <li><a href="#">Clients</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </footer>
        <!-- End Footer -->


        <!-- Back to top -->
        <a href="#" class="back-to-top" id="back-to-top"> <i class="fa fa-angle-up"></i> </a>


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="front/js/jquery-2.1.4.min.js"></script>
        <script src="front/js/bootstrap.min.js"></script>

        <!-- Jquery easing -->
        <script type="text/javascript" src="front/js/jquery.easing.1.3.min.js"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="front/js/owl.carousel.min.js"></script>

        <!--sticky header-->
        <script type="text/javascript" src="front/js/jquery.sticky.js"></script>

        <!--common script for all pages-->
        <script src="front/js/jquery.app.js"></script>

        <script type="text/javascript">
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive:{
                    0:{
                        items:1
                    }
                }
            })
        </script>

    </body>
</html>
