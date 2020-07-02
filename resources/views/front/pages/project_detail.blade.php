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
                                <a href="{{route('image_id', [$data->slug, 'fasilitas', $f->id])}}">
                                    <img src="{{$f->image_url}}" alt="Image" class="img-fluid" onerror="this.src='{{Storage::url('upload/fasilitas/fasilitas.png')}}'">
                                </a>
                            </figure>
                            <div class="person-contents">
                                <h4>{{$f->name}}</h4>
                                <span class="position">{{$f->keterangan}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-12">
                    <a href="{{route('image', [$data->slug, 'project'])}}" class="btn btn-info btn-sm float-right" style="font-size: 10px;">lainya . . .</a>
                </div>
            </div>
            <hr/>
            @endif
            <div class="row">
                @foreach($data->detail as $item)
                    <div class="col-md-7 mb-4">
                        <a href="{{route('image_id', [$data->slug, 'detail', $item->id])}}">
                            <img src="{{$item->image_url}}" alt="Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-md-4 ml-auto">
                        <h2 class="text-black mb-4">{{$item->title}}</h2>
                        <p>{!! $item->keterangan !!}</p>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a target="_blank" href="https://wa.me/{{Facades\Services\ConfigService::findByName('info_wa')->keterangan}}?text=untuk type '{{$item->title}}" class="btn btn-primary btn-md rounded-0 py-3 px-5">Whatsapp</a>
                            <a href="{{route('image_id', [$data->slug, 'detail', $item->id])}}" class="btn btn-info rounded-0 py-3 px-5">Foto Lain</a>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-12">
                    <a href="{{route('image', [$data->slug, 'project'])}}" class="btn btn-info btn-sm float-right" style="font-size: 10px;">lainya . . .</a>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
@endsection
