@extends('layouts.app')

@section('content')
    @auth
        @if ($posts->isEmpty())
            <span class="container">No post availble for now, please follow some account.</span>
        @else
            @foreach ($posts as $post)
                <div class="container p-3 col-9">
                    <div class="row border">
                        <div class="bg-white col-md-8 d-flex justify-content-center p-0">
                            <img height="100%" width="100%" src="/storage/{{ $post->image }}" alt="">
                        </div>
                        <div class="bg-white col-md-4 p-0 border-md-left">
                            <div class="header d-flex align-items-center p-3 h5">
                                <a href="{{ route('profile.show', $post->user->id) }}" class="d-flex align-items-center">   
                                    <img class="rounded-circle" height="35px" src="/storage/{{ $post->user->profile->image }}" alt="">
                                    <h5 class="ml-3 mr-1 mb-0 font-weight-bold text-dark" style="font-size: 0.9em; text-decoration: none;">{{ $post->user->name }}</h5>
                                </a>
                            </div>
                            <div class="caption border-bottom p-3">
                                {{ $post->caption }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        @endif
    @else
        <div class="container text-center mt-5">
            <div class="display-3 m-b-md">
                Instagrame clone
            </div>
            <span>Made by Mouad Benali</span><br>
            <span class="col-3">this project was made following <a href="">coderstape</a> tuts, this is my first project made with laravel.</span>
        </div>
    @endauth
@endsection
