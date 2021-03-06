<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Services - Moderna Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendor/venobox/venobox.css" rel="stylesheet">
    <link href="vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Moderna - v2.2.1
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container">

            <div class="logo float-left">
                <!--<h1 class="text-light"><a href="index"><span>Moderna</span></a></h1> -->
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="index"><img src="img/logo.png" alt="" class="img-fluid"></a>
            </div>

            <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="index">Accueil</a></li>
          <li><a href="about">A propos</a></li>
          <li class="drop-down"><a href="services">Services</a>
            <ul>
              <li><a href="Medical">Medical & Pharma</a></li>
              <li><a href="Industry">Industry</a></li>
              <li><a href="Retail">Retail & Crowd analysis</a></li>
            </ul>
          </li>
          <li><a href="contact">Contact Us</a></li>
        </ul>
      </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- our services section-->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Our Services</h2>
                    <ol>
                        <li><a href="index">Home</a></li>
                        <li><a href="services">Our Services</a></li>
                        <li>Skin segmentation</li>
                    </ol>
                </div>

            </div>
        </section>
        <!-- end of our services section -->

        <!-- =========== File upload Form section ======== -->
        <section>
            <div class="container">


                @if ($message = Session::get('success'))
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-block col-md-12" style="width: 100%">
                                <button type="button" class="close" data-dismiss="alert">??</button>
                                <strong>{{ $message }}</strong>
                            </div><br>
                        </div>
                        <div class="cold-md-12">
                            <div class="col-md-6">
                                <img src="{{ Session::get('image') }}?={{ Date('U') }}" />
                            </div>
                            <div class="col-md-12 mx-auto my-2" style="float: left;">
                                <a href="{{ URL::to('/') }}/{{ Session::get('image') }}?={{ Date('U') }}"
                                    target="_blank">
                                    <button class="btn btn-primary"><i class="fa fa-download"></i> Download File
                                        jpg</button>
                                </a>
                                <a href="{{ URL::to('/') }}/{{ Session::get('imagenifti') }}?={{ Date('U') }}"
                                    target="_blank">
                                    <button class="btn btn-primary"><i class="fa fa-download"></i> Download File
                                        Nifti</button>
                                </a>
                            </div>
                        </div>
                        <br /> <br />
                    </div>
            </div>
            @endif





            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Chargez votre fichier ici</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('skinseg') }}" aria-label="{{ __('Upload') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="image"
                                        class="col-sm-4 col-form-label text-md-right">{{ __('Fichier') }}</label>
                                    <div class="col-md-6">
                                        <input id="image" name="image" type="file"
                                            class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                            required autofocus />
                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="mx-auto">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Chargez !') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- end of file upload form section-->

        <h4 class="my-3" style="text-align: center">tester les autres services </h4>

        <!-- ======= Service Details Section ======= -->
        <section class="service-details">
            <div class="container">

                <div class="row ">

                    <div class="col-md-4 d-flex align-items-stretch mx-auto" data-aos="fade-up">
                        <div class="card">
                            <div class="card-img">
                                <img src="img/service-details-2.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="object-detection">Object detection</a></h5>
                                <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                    veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>
                                <div class="read-more"><a href="object-detection"><i
                                            class="icofont-arrow-right"></i> Read More</a></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 d-flex align-items-stretch mx-auto" data-aos="fade-up">
                        <div class="card">
                            <div class="card-img">
                                <img src="img/service-details-3.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="face-and-gender-detection">Face and Gender
                                        detection</a></h5>
                                <p class="card-text">Nemo enim ipsam voluptatem quia voluptas sit aut odit aut
                                    fugit, sed quia magni dolores eos qui ratione voluptatem sequi nesciunt Neque porro
                                    quisquam est, qui dolorem ipsum quia dolor sit amet</p>
                                <div class="read-more"><a href="face-and-gender-detection"><i
                                            class="icofont-arrow-right"></i> Read More</a></div>
                            </div>
                        </div>
                    </div>
                </div>
        </section><!-- End Service Details Section -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>

                    </div>

                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>About Moderna</h3>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                            valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Moderna</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="vendor/php-email-form/validate.js"></script>
    <script src="vendor/venobox/venobox.min.js"></script>
    <script src="vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="vendor/counterup/counterup.min.js"></script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="js/main.js"></script>
    <!--script>
    var loadFile = function(event) {
      var output = document.getElementById('my-output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.style.width ="250px";
      output.style.height ="250px";
      output.style.display ="block";
      output.className="mx-auto"
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
  </script-->
</body>

</html>
