@extends('layout.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>{{__('Publicaciones')}}</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header bg-primary text-white">{{$post->title}}</h5>
                    <div class="card-body">
                        <p class="card-text">{!! $post->body !!}</p>
                        <a href="{{route('post',$post->id)}}" class="btn btn-primary">{{ __('Ir a la publicación') }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
