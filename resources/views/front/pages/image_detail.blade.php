@extends('front.layout.index')
@section('css')
@endsection

@section('content')
    <div class="site-section">
        <div class="container">
            <h3 class="mb-4">{{$data->title}}</h3>
            <p class="font-italic text-muted mb-2">{!! $data->keterangan !!}</p>
            <hr/>
            <h4 class="mb-4">{{$detail->title}}</h4>
            <div class="row">
                <div class="col-md-3">
                    <div class="person">
                        <figure>
                            <a href="{{$detail->image_url}}">
                            <img src="{{$detail->image_url}}" alt="Image" class="img-fluid" onerror="this.src='{{Storage::url('upload/detail/detail.png')}}'">
                            </a>
                        </figure>
                        <div class="person-contents">
                            <h4>{{$detail->title}}</h4>
                        </div>
                    </div>
                </div>
                @foreach($galery as $g)
                    <div class="col-md-3">
                        <div class="person">
                            <figure>
                                <a href="{{$g['image_url']}}">
                                <img src="{{$g['image_url']}}" alt="Image" class="img-fluid" onerror="this.src='{{Storage::url('upload/galery/galery.png')}}'">
                                </a>
                            </figure>
                            <div class="person-contents">
                                <h6>{{$g['name']}}</h6>
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
