@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit your profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}"  enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group mx-2 row">
                            <label for="file">Profile picture : </label>
                            <input type="file" class="form-control-file" name="image">
                            @error('image')
                                <span class="small text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="staticUsername" class="col-sm-2 col-form-label">username</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" id="staticUsername" value="{{Auth::user()->username }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="name" value="{{ old('name') ?? Auth::user()->name }}">
                            @error('name')
                                <span class="small text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Desctiption title</label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="title" value="{{ old('title') ?? Auth::user()->profile->title }}">
                            @error('title')
                                <span class="small text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="desc">Desctiption</label>
                            <textarea name="desc" class="form-control" id="desc" rows="3" value="">{{ old('desc') ?? Auth::user()->profile->desc }}</textarea>
                            @error('desc')
                                <span class="small text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="link">Link</label>
                            <input name="link" type="text" class="form-control" id="link" placeholder="link" value="{{ old('link ') ?? Auth::user()->profile->link }}">
                            @error('link')
                                <span class="small text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
