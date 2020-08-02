<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{Facades\Services\ConfigService::findByName('info_name')->keterangan}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta Content="{{Facades\Services\ConfigService::findByName('blog_meta_description')->keterangan}}" Name="Description"/>
  <meta Content="{{Facades\Services\ConfigService::findByName('blog_meta_keywords')->keterangan}}" Name="Keywords"/>


  <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700|Muli:300,400" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('assets/front/fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{ asset('assets/front/css/jquery.fancybox.min.css')}}">

  <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" href="{{ asset('assets/front/fonts/flaticon/font/flaticon.css')}}">

  <link rel="stylesheet" href="{{ asset('assets/front/css/aos.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/jquery.mb.YTPlayer.min.css')}}" media="all" type="text/css">

  <link rel="stylesheet" href="{{ asset('assets/front/css/style.css')}}">
  @yield('css')

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    
    <div class="header-top bg-light">
      <div class="container pb-1 pt-1">
        <div class="row align-items-center">
          <div class="col-9 col-lg-4">
            <a href="{{url('/')}}">
              <img src="{{Storage::url('upload/config/'.Facades\Services\ConfigService::findByName('info_img_logo')->keterangan)}}" alt="Image" class="img-fluid" style="height: 100px">{{Facades\Services\ConfigService::findByName('info_name')->keterangan}}
            </a>
          </div>
          <div class="col-lg-4 d-none d-lg-block">
            <div class="quick-contact-icons d-flex">
              <div class="icon align-self-start">
                <span class="flaticon-call text-primary"></span>
              </div>
              <div class="text">
                <span class="h4 d-block">{{Facades\Services\ConfigService::findByName('info_phone')->keterangan}}</span>
                {{-- <span class="caption-text">Toll free</span> --}}
              </div>
            </div>
          </div>

          <div class="col-lg-4 d-none d-lg-block">
            <div class="quick-contact-icons d-flex">
              <div class="icon align-self-start">
                <span class="flaticon-email text-primary"></span>
              </div>
              <div class="text">
                <span class="h4 d-block">{{Facades\Services\ConfigService::findByName('info_email')->keterangan}}</span>
                {{-- <span class="caption-text">Gournadi, 1230 Bariasl</span> --}}
              </div>
            </div>
          </div>

          <div class="col-3 d-block d-lg-none text-right">
              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">
        <div class="container">
          <div class="d-flex align-items-center">
            <div class="mr-auto">
              <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                  <li><a href="{{route('home')}}" class="nav-link text-left">Home</a></li>
                  <li><a href="{{route('about')}}" class="nav-link text-left">Tentang Kami</a></li>
                  <li><a href="{{route('project')}}" class="nav-link text-left">Project</a></li>
                  <li><a href="{{route('progres')}}" class="nav-link text-left">Progres</a></li>
                  <li><a href="{{route('galery')}}" class="nav-link text-left">Galery</a></li>
                  {{-- <li>
                    <a href="testimonials.html" class="nav-link text-left">Testimonials</a>
                  </li> --}}
                  {{-- <li>
                    <a href="blog.html" class="nav-link text-left">Blog</a>
                  </li> --}}
                  <li><a href="{{route('contact')}}" class="nav-link text-left">Contact</a></li>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
        @for($i=0;$i<App\Slider::count();$i++)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" @if($i == 0) class="active" @endif></li>
        @endfor
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        @foreach(App\Slider::all() as $slider)
          <div class="carousel-item @if($loop->first) active @endif" style="background-image: url({{$slider->image_url}})">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="display-4">{{$slider->name}}</h2>
              {{-- <p class="lead">{{$slider->name}}</p> --}}
            </div>
          </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- END slider -->

    @yield('content')

    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <p class="mb-4">
              <img src="{{Storage::url('upload/config/'.Facades\Services\ConfigService::findByName('info_img_logo')->keterangan)}}" alt="Image" class="img-fluid">
            </p>
          </div>
          <div class="col-lg-3">
            <h3 class="footer-heading"><span>{{Facades\Services\ConfigService::findByName('info_name')->keterangan}}</span></h3>
            <p>{{Str::limit(strip_tags(Facades\Services\ConfigService::findByName('info_tentang')->keterangan), 150)}}</p>  
            <p><a href="#">Learn More</a></p>
          </div>
          <div class="col-lg-3">
            <h3 class="footer-heading"><span>Perusahaan Kami</span></h3>
            <ul class="list-unstyled">
                <li><a href="{{route('about')}}">About</a></li>
                <li><a href="{{route('about')}}">Tim Kami</a></li>
                <li><a href="{{route('project')}}">Project</a></li>
                <li><a href="{{route('galery')}}">Galery</a></li>
                <li><a href="#">Careers</a></li>
            </ul>
          </div>
          <div class="col-lg-3">
              <h3 class="footer-heading"><span>Kontak</span></h3>
              <ul class="list-unstyled">
                  <li><a href="{{route('contact')}}">Bantuan</a></li>
                  <li>{{Facades\Services\ConfigService::findByName('info_email')->keterangan}}</li>
                  <li>{{Facades\Services\ConfigService::findByName('info_phone')->keterangan}}</li>
                  <li>{!!Facades\Services\ConfigService::findByName('info_address')->keterangan!!}</li>
                  <li>{!!Facades\Services\ConfigService::findByName('info_address_pm')->keterangan!!}</li>
              </ul>
          </div>
        </div>

        {{-- <div class="row">
          <div class="col-12">
            <div class="copyright">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
    

  </div>
    <div class="sosmed">
      <a target="_blank" href="http://facebook.com{{Facades\Services\ConfigService::findByName('social_fb')->keterangan}}" class="btn btn-info"><span class="icon-facebook"></span></a>
      <a target="_blank" href="http://www.instagram.com{{Facades\Services\ConfigService::findByName('social_ig')->keterangan}}" class="btn btn-danger"><span class="icon-instagram"></span></a>
      <a target="_blank" href="https://wa.me/{{Facades\Services\ConfigService::findByName('info_wa')->keterangan}}" class="btn btn-success"><span class="icon-whatsapp"></span></a>
    </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>

  <script src="{{asset('assets/front/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery-ui.js')}}"></script>
  <script src="{{asset('assets/front/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/front/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('assets/front/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('assets/front/js/aos.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.sticky.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.mb.YTPlayer.min.js')}}"></script>


  <script src="{{asset('assets/front/js/main.js')}}"></script>

  @yield('js')

</body>

</html>