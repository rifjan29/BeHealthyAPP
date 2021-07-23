<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Be Healthy</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('landingpage/assets/img/favicons/logo2-web.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('landingpage/assets/img/favicons/logo2-web.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('landingpage/assets/img/favicons/logo2-web.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('landingpage/assets/img/favicons/logo2-web.png') }}">
    <link rel="manifest" href="{{ asset('landingpage/assets/img/favicons/manifest.json') }}">
    {{-- animation --}}
    <link rel="stylesheet" href=" {{ asset('landingpage/assets/css/animations.css') }} ">
    <meta name="msapplication-TileImage" content="{{ asset('landingpage/assets/img/favicons/logo2-web.png') }}">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href=" {{ asset('landingpage/assets/css/theme.css') }}" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand d-flex align-items-center fw-bold fs-2" href="index.html">
            <img src=" {{ asset('landingpage/assets/img/icons/Logo-Web.png') }} " alt="">
          </a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0">
              <li class="nav-item" ><a class="nav-link fw-medium active" aria-current="page" href="{{ route('welcome') }}#home">Beranda</a></li>
              <li class="nav-item"><a class="nav-link fw-medium" href="{{ route('welcome') }}#features">Aplikasi</a></li>
              <li class="nav-item"><a class="nav-link fw-medium" href="{{ route('welcome') }}#artikel">Artikel</a></li>
              <li class="nav-item"><a class="nav-link fw-medium" href="{{ route('welcome') }}#faq">Bantuan</a></li>
            </ul>
            <form class="ps-lg-5">
              <button class="btn btn-lg btn-primary rounded-pill order-0" type="submit">Download Gratis</button>
            </form>
          </div>
        </div>
      </nav>
      <section class="py-0" id="home">
        <div class="bg-holder " style="background-image:url( {{ asset('landingpage/assets/img/illustrations/hero-bg.png') }} );background-position:bottom;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container position-relative">
          <div class="row align-items-center py-8">
            <div class="col-md-5 col-lg-6 order-md-1 text-center text-md-end"><img class="img-fluid js-tilt" src="{{ asset('landingpage/assets/img/illustrations/Ilustrasi-Mobile.png') }}" width="350" alt="" data-tilt /></div>
            <div class="col-md-7 col-lg-6 text-center text-md-start slideRight"><span class="badge bg-light rounded-pill text-dark align-items-center d-flex flex-row-reverse justify-content-end mx-auto mx-md-0 ps-0 w-75 w-sm-50 w-md-75 w-xl-50 mb-3"># 200 Pengguna User Android<img class="img-fluid float-start me-3" src="{{ asset('landingpage/assets/img/illustrations/jumlah-user.png') }}" alt=""/></span>
              <h1 class="mb-4 display-3 fw-bold lh-sm">Best APP for your <br class="d-block d-lg-none d-xl-block" />Healthy</h1>
              <p class="mt-3 mb-4 fs-1">Jaga Kesehatan mu dengan aplikasi Be Healthy. <br class="d-none d-lg-block" />Menjaga kebugaran jasmani anda. Download For Free.</p><a class="btn btn-lg btn-primary rounded-pill hover-top" href="#" role="button">Download Gratis</a>
            </div>
          </div>
        </div>
      </section>
    </main>

      <section class="py-5" id="features">
        <div class="container-lg">
          <div class="row align-items-center">
            <article class="blog-post">
              <center>
                <img src="{{ asset('uploads/article/cover/1626939212.jpg') }}" alt="" class="img-fluid rounded w-75" srcset="">
              </center>
                <h2 class="blog-post-title mt-4" style="font-weight: bold">{{ $artikel->title }}</h2>
                <p class="blog-post-meta">
                  @if (isset($artikel->updated_at))
                    {{ date('d M Y', strtotime($artikel->updated_at)) }}
                  @else
                      {{ date('d M Y', strtotime($artikel->created_at )) }}
                  @endif
                  by {{ $artikel->user->name }}</p>
        
              {!! $artikel->desc !!}
              </article>
          </div>
        </div>
      </section>


    



      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-8 bg-1000">

        <div class="container">
          <div class="row flex-center">
            <div class="col-auto mb-5"><a class="pe-2 d-flex align-items-center text-decoration-none fw-bold fs-3" href="#">
                <div class="text-warning">Aplikasi</div>
                <div class="text-white">Be Healthy</div>
              </a></div>
          </div>
          <div class="row flex-center">
            <div class="col-auto mb-5">
              <ul class="list-unstyled list-inline mb-0">
                <li class="list-inline-item me3 me-sm-4"><a class="text-light text-decoration-none" href="#!">Beranda</a></li>
                <li class="list-inline-item me3 me-sm-4"><a class="text-light text-decoration-none" href="#!">Aplikasi</a></li>
                <li class="list-inline-item me3 me-sm-4"><a class="text-light text-decoration-none" href="#!">Artikel</a></li>
                <li class="list-inline-item me3 me-sm-4"><a class="text-light text-decoration-none" href="#!">Bantuan</a></li>
              </ul>
            </div>
          </div>

          <div class="row flex-center">
            <div class="col-auto">
              <p class="mb-0 fs--1 text-700">&copy; Kelompok 2 TIF Bondowoso &nbsp;
                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" viewBox="0 0 16 16">
                  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                </svg>&nbsp;by&nbsp;<a class="text-700" href="https://themewagon.com/" target="_blank">Be Healthy </a>
              </p>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="{{ asset('landingpage/vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('landingpage/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landingpage/vendors/is/is.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('landingpage/assets/js/theme.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400&amp;display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
    <script src="https://unpkg.com/tilt.js@1.2.1/dest/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            glare: true,
            maxGlare: .5,
            scale:1
        })
    </script>

    <script>
		$(window).scroll(function() {
			$('#gambar-mobile').each(function(){
			var imagePos = $(this).offset().top;

			var topOfWindow = $(window).scrollTop();
				if (imagePos < topOfWindow+400) {
					$(this).addClass("slideUp");
				}
			});

            $('#pilihan-data').each(function(){
			var imagePos = $(this).offset().top;

			var topOfWindow = $(window).scrollTop();
				if (imagePos < topOfWindow+400) {
					$(this).addClass("bigEntrance");
				}
			});
		});
    </script>
</body>

</html>
