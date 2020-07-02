@extends('front.layout.index')
@section('css')
@endsection

@section('content')
<!-- Demo header-->
<section class="py-5 header">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-3">
                <!-- Tabs nav -->
                <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link mb-3 p-3 shadow active" id="v-pills-about-tab" data-toggle="pill" href="#v-pills-about" role="tab" aria-controls="v-pills-about" aria-selected="true">
                        <i class="fa fa-user-circle-o mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Tentang Kami</span>
                    </a>
                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-team-tab" data-toggle="pill" href="#v-pills-team" role="tab" aria-controls="v-pills-team" aria-selected="false">
                        <i class="fa fa-calendar-minus-o mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Tim Kami</span>
                    </a>
                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-contact-tab" data-toggle="pill" href="#v-pills-contact" role="tab" aria-controls="v-pills-contact" aria-selected="false">
                        <i class="fa fa-calendar-minus-o mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Kontak</span>
                    </a>
                </div>
            </div>

            <div class="col-md-9">
                <!-- Tabs content -->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-about" role="tabpanel" aria-labelledby="v-pills-about-tab">
                        {{-- <header class="text-center mb-5 pb-5">
                            <h1 class="display-4">Bootstrap vertical tabs</h1>
                            <p class="font-italic mb-1">Making advantage of Bootstrap 4 components, easily build an awesome tabbed interface.</p>
                            <p class="font-italic">Snippet by
                                <a class="text-white" href="https://bootstrapious.com/">
                                    <u>Bootstrapious</u>
                                </a>
                            </p>
                        </header> --}}
                        <h4 class="font-italic mb-4">Tentang Kami</h4>
                        <p class="font-italic text-muted mb-2">{!! Facades\Services\ConfigService::findByName('info_tentang')->keterangan !!}</p>
                    </div>
                    
                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-team" role="tabpanel" aria-labelledby="v-pills-team-tab">
                        <h4 class="font-italic mb-4">Tim Kami</h4>
                        <div class="row">
                            @foreach($data as $about)
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
                    </div>

                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">
                        <h4 class="font-italic mb-4">Kontak</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" class="form-control form-control-lg">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" id="lname" class="form-control form-control-lg">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="eaddress">Email Address</label>
                                <input type="text" id="eaddress" class="form-control form-control-lg">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="tel">Tel. Number</label>
                                <input type="text" id="tel" class="form-control form-control-lg">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="message">Message</label>
                                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <input type="submit" value="Send Message" class="btn btn-primary rounded-0 px-3 px-5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-3" style="height: 300px; overflow-y: scroll;">
                <a class="twitter-timeline" href="https://twitter.com/TwitterDev?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div class="col-md-3" style="height: 300px">
                <div class="fb-page" 
                    data-href="https://www.facebook.com/loji.tjokro.9" 
                    data-tabs="timeline" 
                    data-width="400" 
                    data-height="300" 
                    data-small-header="true" 
                    data-adapt-container-width="true" 
                    data-hide-cover="false" 
                    data-show-facepile="false"></div>
            </div>
        </div> --}}
    </div>
</section>
@endsection
@section('js')
@endsection
