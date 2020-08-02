@extends('front.layout.index')
@section('css')
@endsection

@section('content')

    <div class="site-section">
      <div class="block-2">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6 mb-4 mb-lg-0">
                      <img src="{{Storage::url('upload/config/'.Facades\Services\ConfigService::findByName('info_img_image')->keterangan)}}" alt="Image " class="img-fluid img-overlap">
                  </div>
                  <div class="col-lg-5 ml-auto">
                      <h3 class="section-subtitle">Kenapa Memilih Kami?</h3>
                      <p class="section-title mb-4">{!! Facades\Services\ConfigService::findByName('info_tentang')->keterangan !!}</p>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <!-- END block-2 -->

    <div class="site-section">
        <div class="container">
            <hr/>
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-5">
                    <h3 class="section-subtitle"><strong>Tim Kami</strong></h3>
                </div>
            </div>
            <div class="row">
                @foreach(\App\About::limit(4)->get() as $about)
                <div class="col-lg-3 col-md-6 mb-lg-0">
                    <div class="person">
                        <figure>
                            <img src="{{$about->avatar_url}}" alt="Image" class="img-fluid" onerror="this.src='{{Storage::url('upload/about/about.png')}}'">
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
            <hr/>
        </div>
    </div>
    <!-- END block-2 -->

    <div class="site-section block-2 mt-5">
        <div class="container mb-5">
            <div class="mb-5">
                <h3 class="section-subtitle">Project Kami</h3>
                <h2 class="section-title mb-4"><strong>List project kami</h2>
            </div>
            <div class="projects-carousel-wrap">
                <div class="owl-carousel owl-slide-3">
                    @foreach($project as $p)
                        <div class="project-item">
                            <div class="project-item-contents">
                                <a href="{{($p->is_progres)?route('progresDetail', $p->slug):route('projectDetail', $p->slug)}}">
                                    <span class="project-item-category">{{$p->title}}</span>
                                    <h2 class="project-item-title">
                                        {{$p->subtitle}}
                                    </h2>
                                </a>
                            </div>
                            <img src="{{$p->image_url}}" alt="Image" class="img-fluid">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-5">
                    <h3 class="section-subtitle"><strong>Galery</strong></h3>
                </div>
            </div>
            <div class="row">
                @foreach(\App\Galery::limit(6)->get() as $galery)
                <div class="col-md-6 col-lg-2 mb-4">
                    <div class="project-item galery">
                        <div class="project-item-contents">
                            <a href="{{$galery->image_url}}">
                                <span class="project-item-category">{{$galery->name}}</span>
                            </a>
                        </div>
                        <a href="{{$galery->image_url}}">
                            <img src="{{$galery->image_url}}" alt="Image" class="img-fluid">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <hr/>
        </div>
    </div>

    <div class="site-section block-3 mt-5">
        <div class="container">
            <div class="mb-5">
                <h3 class="section-subtitle">Fasilitas</h3>
                <h2 class="section-title mb-4"><strong>beberapa fasilitas kami</h2>
            </div>
            <div class="row">
                @foreach(\App\Fasilitas::limit(4)->get() as $f)
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="project-item">
                            <div class="project-item-contents">
                                <a href="{{route('image_id', [$f->project->slug, 'fasilitas', $f->id])}}">
                                    <span class="project-item-category">{{$f->name}}</span>
                                </a>
                            </div>
                            <img src="{{$f->image_url}}" alt="Image" class="img-fluid">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
@section('js')
@endsection
