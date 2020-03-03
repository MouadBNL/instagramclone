@extends('layouts.app')

@section('content')
    @auth
        
    @else
        <div class="container text-center mt-5">
            <div class="display-3 m-b-md">
                Selma The cutie
            </div>
            <span>Made by Mouad Benali</span>
        </div>
    @endauth
@endsection
