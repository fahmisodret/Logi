@extends('front.layout.index')
@section('css')
@endsection

@section('content')
    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 mb-5 text-center">
            <h3 class="section-subtitle">Tim Kami</h3>
            <h2 class="section-title text-black mb-4">Kami punya Tim yang <strong>bagus dan berpengalaman</strong>.</h2>
          </div>
        </div>

        <div class="row">
          @foreach($data as $about)
          <div class="col-lg-3 col-md-6 mb-lg-0">
            <div class="person">
              <figure>
                <img src="{{$about->avatar_url}}" alt="Image" class="img-fluid">
                <div class="social">
                  <a href="{{$about->fb}}"><span class="icon-facebook"></span></a>
                  <a href="{{$about->twitter}}"><span class="icon-twitter"></span></a>
                  <a href="{{$about->in}}"><span class="icon-linkedin"></span></a>
                </div>
              </figure>
              <div class="person-contents">
                <h3>{{$about->name}}</h3>
                <span class="position">{{$about->title}}</span>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="site-section services-1-wrap">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-5">
              <h3 class="section-subtitle">What We Do</h3>
              <h2 class="section-title mb-4 text-black">We Are <strong>Leading Industry</strong> of Engineering. We Love What We Do</h2>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-3 col-md-6">
            <div class="service-1">
              <span class="number">01</span>
              <div class="service-1-icon">
                <span class="flaticon-engineer"></span>
              </div>
              <div class="service-1-content">
                <h3 class="service-heading">Professional Team</h3>
                <p>Gravida sodales condimentum pellen tesq accumsan orci quam sagittis sapie</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="service-1">
              <span class="number">02</span>
              <div class="service-1-icon">
                <span class="flaticon-compass"></span>
              </div>
              <div class="service-1-content">
                <h3 class="service-heading">Great Ideas</h3>
                <p>Gravida sodales condimentum pellen tesq accumsan orci quam sagittis sapie</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="service-1">
              <span class="number">03</span>
              <div class="service-1-icon">
                <span class="flaticon-oil-platform"></span>
              </div>
              <div class="service-1-content">
                <h3 class="service-heading">Quality Building</h3>
                <p>Gravida sodales condimentum pellen tesq accumsan orci quam sagittis sapie</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="service-1">
              <span class="number">04</span>
              <div class="service-1-icon">
                <span class="flaticon-crane"></span>
              </div>
              <div class="service-1-content">
                <h3 class="service-heading">Quality Works</h3>
                <p>Gravida sodales condimentum pellen tesq accumsan orci quam sagittis sapie</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END services -->

    <div class="site-section pb-0">
      <div class="block-2 pb-0 mb-0">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
              <img src="images/about_1.jpg" alt="Image " class="img-fluid img-overlap">
            </div>
            <div class="col-lg-5 ml-auto">
              <h3 class="section-subtitle">Why Choose Us</h3>
              <h2 class="section-title mb-4">More than <strong>50 year experience</strong> in industry</h2>
              <p>Reprehenderit, odio laboriosam? Blanditiis quae ullam quasi illum minima nostrum perspiciatis error consequatur sit nulla.</p>

              <div class="row my-5">
                <div class="col-lg-12 d-flex align-items-center mb-4">
                  <span class="line-height-0 flaticon-oil-platform display-4 mr-4 text-primary"></span>
                  <div>
                    <h4 class="m-0 h5 text-white">Expert in Builings</h4>
                    <p class="text-white">Lorem ipsum dolor sit amet.</p>
                  </div>
                </div>
                <div class="col-lg-12 d-flex align-items-center mb-4">
                  <span class="line-height-0 flaticon-compass display-4 mr-4 text-primary"></span>
                  <div>
                    <h4 class="m-0 h5 text-white">Modern Design</h4>
                    <p class="text-white">Lorem ipsum dolor sit amet.</p>
                  </div>
                </div>
                <div class="col-lg-12 d-flex align-items-center">
                  <span class="line-height-0 flaticon-planning display-4 mr-4 text-primary"></span>
                  <div>
                    <h4 class="m-0 h5 text-white">Leading In Floor Planning</h4>
                    <p class="text-white">Lorem ipsum dolor sit amet.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END block-2 -->
    
    {{-- <div class="py-5 bg-primary block-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h3 class="text-white">Subscribe To Newsletter</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, reprehenderit!</p>
          </div>
          <div class="col-lg-6">
            <form action="#" class="form-subscribe d-flex">
              <input type="text" class="form-control form-control-lg">
              <input type="submit" class="btn btn-secondary px-4" value="Subcribe">
            </form>
          </div>
        </div>
      </div>
    </div> --}}

@endsection
@section('js')
@endsection
