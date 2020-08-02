@extends('front.layout.index')
@section('css')
@endsection

@section('content')
    <div class="site-section">
        <div class="container">
            <h3 class="mb-4">{{$data->title}}</h3>
            <img src="{{$data->image_url}}" alt="Image" class="img-fluid">
            <p class="font-italic text-muted mb-2">{!! $data->keterangan !!}</p>
            <hr/>
       </div>
    </div>

@endsection
@section('js')
@endsection
