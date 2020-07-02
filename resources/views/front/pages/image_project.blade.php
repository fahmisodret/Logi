@extends('front.layout.index')
@section('css')
@endsection

@section('content')
    <div class="site-section">
        <div class="container">
            <h3 class="mb-4">{{$data->title}}</h3>
            <p class="font-italic text-muted mb-2">{!! $data->keterangan !!}</p>
            <hr/>
            @if($data->fasilitas)
            <h4 class="mb-4">Fasilitas</h4>
            <div class="row">
                @foreach($data->fasilitas as $f)
                    <div class="col-md-3">
                        <div class="person">
                            <figure>
                                <a href="{{$f->image_url}}">
                                <img src="{{$f->image_url}}" alt="Image" class="img-fluid" onerror="this.src='{{Storage::url('upload/fasilitas/fasilitas.png')}}'">
                                </a>
                            </figure>
                            <div class="person-contents">
                                <h6>{{$f->name}}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
            <hr/>
            @if($data->detail)
            <h4 class="mb-4">Detail/Type</h4>
            <div class="row">
                @foreach($data->detail as $d)
                    <div class="col-md-3">
                        <div class="person">
                            <figure>
                                <a href="{{$d->image_url}}">
                                    <img src="{{$d->image_url}}" alt="Image" class="img-fluid" onerror="this.src='{{Storage::url('upload/fasilitas/fasilitas.png')}}'">
                                </a>
                            </figure>
                            <div class="person-contents">
                                <h6>{{$f->title}}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
            <hr/>
            <h4 class="mb-4">Galery</h4>
            <div class="row">
                @foreach($galery as $g)
                    <div class="col-md-3">
                        <div class="person">
                            <figure>
                                <a href="{{$g['image_url']}}">
                                <img src="{{$g['image_url']}}" alt="Image" class="img-fluid" onerror="this.src='{{Storage::url('upload/galery/galery.png')}}'">
                                </a>
                            </figure>
                            <div class="person-contents">
                                <h4>{{$g['name']}}</h4>
                                <span class="position">{{$g['keterangan']}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
@section('js')
@endsection
