@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a new Post</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post.store') }}"  enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mx-2 row">
                            <label for="file">Image : </label>
                            <input type="file" class="form-control-file" name="image">
                            @error('image')
                                <span class="small text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <textarea name="caption" class="form-control" id="caption"></textarea>
                            @error('caption')
                                <span class="small text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Share</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
