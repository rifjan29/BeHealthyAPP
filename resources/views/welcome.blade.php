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
              <li class="nav-item" data-anchor="data-anchor"><a class="nav-link fw-medium active" aria-current="page" href="#home">Beranda</a></li>
              <li class="nav-item" data-anchor="data-anchor"><a class="nav-link fw-medium" href="#features">Aplikasi</a></li>
              <li class="nav-item" data-anchor="data-anchor"><a class="nav-link fw-medium" href="#pricing">Artikel</a></li>
              <li class="nav-item" data-anchor="data-anchor"><a class="nav-link fw-medium" href="#faq">Bantuan</a></li>
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
              <h1 class="mb-4 display-3 fw-bold lh-sm">Best app for your <br class="d-block d-lg-none d-xl-block" />Healthy</h1>
              <p class="mt-3 mb-4 fs-1">Jaga Kesehatan mu dengan aplikasi Be Healthy. Download For Free <br class="d-none d-lg-block" />Selalu menjaga kebugaran jasmani anda.</p><a class="btn btn-lg btn-primary rounded-pill hover-top" href="#" role="button">Download Gratis</a>
            </div>
          </div>
        </div>
      </section>


      <section class="py-5" id="features">
        <div class="container-lg">
          <div class="row align-items-center">
            <div class="col-md-5 col-lg-7 order-md-0 text-center text-md-start"><img class="img-fluid" id="gambar-mobile" style="visibility: hidden" src="{{ asset('landingpage/assets/img/illustrations/Ilustrasi-Mobile2.png') }}" width="550" alt=""/></div>
            <div class="col-md-7 col-lg-5 px-sm-5 px-md-0 " style="visibility: hidden;" id="pilihan-data">
              <h6 class="fw-bold fs-4 display-3 lh-sm">Fitur Aplikasi yang <br/> Luar Biasa</h6>
              <p class="my-4">Increase productivity with a simple to-do app. app for <br class="d-none d-xl-block" />managing your personal budgets.</p>
              <div class="d-flex align-items-center mb-5">
                <div><img class="img-fluid" src="{{ asset('landingpage/assets/img/illustrations/icon-olahraga.png') }}" width="90" alt="" /></div>
                <div class="px-4">
                  <h5 class="fw-bold text-danger">Olahraga Ringan</h5>
                  <p>Get your blood tests delivered at <br class="d-none d-xl-block"> home collect a sample from the <br class="d-none d-xl-block"> news your blood tests</p>
                </div>
              </div>
              <div class="d-flex align-items-center mb-5">
                <div><img class="img-fluid" src="{{ asset('landingpage/assets/img/illustrations/icon-yoga.png') }}" width="90" alt="" /></div>
                <div class="px-4">
                  <h5 class="fw-bold text-primary">Senam Yoga</h5>
                  <p>Get your blood tests delivered at <br class="d-none d-xl-block"> home collect a sample from the <br class="d-none d-xl-block"> news your blood tests</p>
                </div>
              </div>
              <div class="d-flex align-items-center mb-5">
                <div><img class="img-fluid" src="{{ asset('landingpage/assets/img/illustrations/icon-meditasi.png') }}" width="90" alt="" /></div>
                <div class="px-4">
                  <h5 class="fw-bold text-success">Meditasi Musik</h5>
                  <p>Get your blood tests delivered at <br class="d-none d-xl-block"> home collect a sample from the <br class="d-none d-xl-block"> news your blood tests</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-5">

        <div class="container">
          <div class="row align-items-center mb-6">
            <div class="col-md-5 col-lg-4 offset-lg-1">
              <h1 class="fw-bold lh-base">Aplikasi Be Healthy</h1>
            </div>
            <div class="col-md-6 col-lg-5 offset-lg-1 border-start py-5 ps-5">
              <p class="mb-0">Kebugaran fisik bukanlah satu-satunya kunci terpenting dari sebuah tubuh yang sehat, hal itu adalah dasar dari aktivitas intelektual yang dinamis dan kreatif.</p>
              <strong class="d-flex justify-content-end"> <em> By: John F. Kennedy</em></strong>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-6">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-5 order-md-1 text-center text-md-start tossing"><img class="mb-4" width="800" src="{{ asset('landingpage/assets/img/illustrations/artikel-bacground.png') }}" alt="" /></div>
              <div class="col-md-6 text-center text-md-start">
                <h6 class="fw-bold fs-4 display-3 lh-sm">Artikel Terbaru<br />dari Be Healthy</h6>
                <p class="my-4 pe-xl-5"> Terdapat beberapa artikel terbaru yang dapat dinikmati oleh pengunjung.</p>
                <div class="row">
                    @foreach ($artikel as $item)
                      <div class="col-md-6">
                        <div class="mb-4">
                            <a href="{{route('welcome-detail', $item->slug) }}">
                            <div class="py-4"><img class="img-fluid" src="{{ asset('landingpage/assets/img/gallery/artikel-1.png') }}" width="450" alt="" /></div>
                            </a>
                            <div class="row">
                                <div class="col-lg-7 d-flex justify-content-start">
                                    <h5 class="fw-bold text-undefined"> {{ $item->title }} </h5>
                                </div>
                                <div class="col-lg-5 d-flex justify-content-end info-text">
                                    <div class="">
                                        <p class="text-muted">
                                            @if (isset($item->updated_at))
                                                {{ date('d M Y', strtotime($item->updated_at)) }}
                                            @else
                                                {{ date('d M Y', strtotime($item->created_at )) }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                          </div>
                          <p class="mt-2 mb-0">Get your blood tests delivered at home collect a sample from the news your blood tests.</p>
                          <div class="d-flex justify-content-end">
                            <a class="btn btn-lg btn-primary rounded-pill hover-top mt-4" href="#" role="button">Selengkapnya</a>
                          </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <hr>
                <div class="d-flex justify-content-end">
                  <a class="btn btn-lg btn-primary rounded-pill hover-top" href="" role="button">Selanjutnya</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-8" id="faq">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 text-center mb-3">
              <h6 class="fw-bold fs-4 display-3 lh-sm mb-3">Bantuan Aplikasi</h6>
              <p class="mb-5">The rise of mobile devices transforms the way we consume information entirely and the world's most elevant channels such as Facebook.</p>
            </div>
          </div>
          <div class="row flex-center">
            <div class="col-lg-9">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item mb-2">
                  <h2 class="accordion-header" id="heading1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1"><span class="mb-0 fw-bold text-start fs-1 text-1000">How to contact with riders emergency?</span></button>
                  </h2>
                  <div class="accordion-collapse collapse show" id="collapse1" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                    <div class="accordion-body bg-100">Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</div>
                  </div>
                </div>
                <div class="accordion-item mb-2">
                  <h2 class="accordion-header" id="heading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2"><span class="mb-0 fw-bold text-start fs-1 text-1000">App installation failed, how to update system information?</span></button>
                  </h2>
                  <div class="accordion-collapse collapse" id="collapse2" aria-labelledby="heading2" data-bs-parent="#accordionExample">
                    <div class="accordion-body bg-100">You can issue either partial or full refunds. There are no fees to refund a charge, but the fees from the original charge are not returned.</div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <section class="py-6">
        <hr />
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5 col-lg-7 order-md-1 text-center text-md-start z-index-2 cta-image"><img class="img-fluid mb-4 mb-md-0" src="{{ asset('landingpage/assets/img/illustrations/cta.png') }}" width="850" alt="" /></div>
            <div class="col-md-7 col-lg-5 text-center text-md-start">
              <h1 class="display-3 fw-bold lh-sm">Download our App now</h1>
              <p class="my-4"> The rise of mobile devices transforms the way we consume information entirely and the world's most elevant channels such as Facebook.</p>
              <div class="d-flex justify-content-center d-md-inline-block"><a class="pe-2 pe-sm-3 pe-md-4" href="!#"><img src="{{ asset('landingpage/assets/img/illustrations/google-play.png') }}" width="160" alt="" /></a><a href="!#"><img src="{{ asset('landingpage/') }}assets/img/illustrations/app-store.png" width="160" alt="" /></a></div>
            </div>
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
