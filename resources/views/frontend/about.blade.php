
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $user_info->value('name') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('upload/main_logo') }}/{{ $user_info->value('main_logo') }}" rel="icon">
  <link href="{{ asset('view_page_ass/assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('view_page_ass/assets') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('view_page_ass/assets') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('view_page_ass/assets') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('view_page_ass/assets') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('view_page_ass/assets') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('view_page_ass/assets') }}/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Laura
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/laura-free-creative-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <div class="container">
        <div class="row">
            <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link active" href="{{ route('frontend.home') }}">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('contact') }}">CONTACT</a>
                </li>
            </ul>
        </div>
    </div>
  <main id="main">

    <!-- ======= About Me Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <span>About Me</span>
          <h2>About Me</h2>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 ">
                <img class="img-fluid img-thumbnail border-0" src="{{ asset('upload/about_image') }}/{{ $user_info->value('about_image') }}" alt="" srcset="">
                <h4 class="text-center m-2">{{ $user_info->value('name') }}</h4>
                    <div class="social-links">
                        @if (!$user_info->value('facebook') == null)
                            <a href="{{ $user_info->value('facebook') }}" class="facebook"><i class="bx bxl-facebook"></i></a>
                        @endif

                        @if (!$user_info->value('twitter') == null)
                            <a href="{{ $user_info->value('twitter') }}" class="twitter"><i class="bx bxl-twitter"></i></a>
                        @endif

                        @if (!$user_info->value('instagram') == null)
                            <a href="{{ $user_info->value('instagram') }}" class="instagram"><i
                                    class="bx bxl-instagram"></i></a>
                        @endif

                        @if (!$user_info->value('linkdin') == null)
                            <a href="{{ $user_info->value('linkdin') }}" class="linkdin"><i class="bx bxl-linkedin"></i></a>
                        @endif
                        @if (!$user_info->value('youtube') == null)
                            <a href="{{ $user_info->value('	youtube') }}" class="	youtube"><i class="bx bxl-youtube"></i></a>
                        @endif
                        @if (!$user_info->value('behance') == null)
                            <a href="{{ $user_info->value('behance') }}" class="behance"><i class="bx bxl-behance"></i></a>
                        @endif
                </div>

            </div>

        </div>
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-md-8">
                <p class="about_description">{{$user_info->value('about_description') }}</p>
            </div>
        </div>
    </div>
     <section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="social-links">
                @if (!$user_info->value('facebook') == null)
                    <a href="{{ $user_info->value('facebook') }}" class="facebook"><i class="bx bxl-facebook"></i></a>
                @endif

                @if (!$user_info->value('twitter') == null)
                    <a href="{{ $user_info->value('twitter') }}" class="twitter"><i class="bx bxl-twitter"></i></a>
                @endif

                @if (!$user_info->value('instagram') == null)
                    <a href="{{ $user_info->value('instagram') }}" class="instagram"><i
                            class="bx bxl-instagram"></i></a>
                @endif

                @if (!$user_info->value('linkdin') == null)
                    <a href="{{ $user_info->value('linkdin') }}" class="linkdin"><i class="bx bxl-linkedin"></i></a>
                @endif
                @if (!$user_info->value('youtube') == null)
                    <a href="{{ $user_info->value('	youtube') }}" class="	youtube"><i class="bx bxl-youtube"></i></a>
                @endif
                @if (!$user_info->value('behance') == null)
                    <a href="{{ $user_info->value('behance') }}" class="behance"><i class="bx bxl-behance"></i></a>
                @endif
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Laura</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/laura-free-creative-bootstrap-theme/ -->
        Development by <a href="https://arifurrahmanrifat29112002.github.io/portfolio_ARR/">Arifur Rahman Rifat</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('view_page_ass/assets') }}/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('view_page_ass/assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('view_page_ass/assets') }}/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('view_page_ass/assets') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('view_page_ass/assets') }}/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('view_page_ass/assets') }}/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{ asset('view_page_ass/assets') }}/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('view_page_ass/assets') }}/js/main.js"></script>

</body>

</html>
