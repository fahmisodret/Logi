@extends('front.layout.index')
@section('css')
@endsection

@section('content')
    <div class="site-section">
        <div class="container">
            <div class="row">
                @foreach($data as $progres)
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="project-item">
                        <div class="project-item-contents">
                            <a href="{{route('progresDetail', $progres->slug)}}">
                            <span class="project-item-category">{{$progres->title}}</span>
                            <h2 class="project-item-title">
                                {{$progres->subtitle}}
                            </h2>
                            </a>
                        </div>
                        <img src="{{$progres->image_url}}" alt="Image" class="img-fluid">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
@section('js')
@endsection
