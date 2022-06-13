@extends('layout.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>{{$post->title}}</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">{!! $post->body !!}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <h5 class="card-header bg-primary text-white">{{__('Publicado por')}} {{ $post->user->name }}</h5>
                <div class="card-body">
                    <p class="card-text">{{ $post->user->email }}</p>
                    <p class="card-text">{{ $post->user->website }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
