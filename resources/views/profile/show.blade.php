@extends('layouts.app')

@section('content')
<div class="container p-5 col-9">
    <div class="row">
        <div class="col-sm-4 d-flex justify-content-center">
            <img class="rounded-circle" height="168px" width="168px" src="/storage/{{ $user->profile->image }}" alt="profile picture">
        </div>
        <div class="col-sm-8">
            <h2 class="font-weight-light d-flex">{{ $user->name }} 
                @if (Auth::user() and Auth::user()->id == $user->id)
                <a href="{{ route('post.create') }}" class="ml-2 btn btn-primary font-weight-bold text-white" style="font-size: 0.4em;">Create post</a>
                @else
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}" />
                @endif
            </h2>
            <div class="account-info d-flex my-3">
                <div class="mr-5"><strong>{{ $user->posts->count() }}</strong> Posts</div>
                <div class="mr-5"><strong>{{ $user->profile->followers->count() }}</strong> Followers</div>
                <div class="mr-5"><strong>{{ $user->following->count() }}</strong> Following</div>
            </div>
            @if ($user->profile)
                @if ($user->profile->title)
                <div class="account-title mt-2">
                    <div><strong>{{ $user->profile->title }}</strong></div>
                </div>
                @endif
                @if ($user->profile->desc)
                <div class="account-desc">
                    <div>{{ $user->profile->desc }}</div>
                </div>
                @endif
                @if ($user->profile->link)
                <div class="account-link mt-2">
                    <a href="{{ $user->profile->link }}">{{ $user->profile->link }}</a>
                </div>
                @endif
            @endif
        </div>
    </div>
    <div class="row mt-5">
        @foreach ($user->posts as $post)
            <a href="{{ route('post.show', $post->id) }}" class="col-4 mb-4">
                <img src="/storage/{{ $post->image }}" alt="" width="100%" height="100%">
            </a>
        @endforeach
    </div>
</div>
@endsection
