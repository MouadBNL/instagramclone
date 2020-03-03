@extends('layouts.app')

@section('content')
<div class="container p-md-5 col-9">
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
                 • 
                 <span style="font-size:24px;">
                 <follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}" />
                </span>
            </div>
            <div class="caption border-bottom p-3">
                {{ $post->caption }}
            </div>
        </div>
    </div>
</div>
@endsection
