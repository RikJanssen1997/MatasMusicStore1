@extends('layouts.app')


@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/filePreview.js"></script>
<link rel="icon" href="{{ url('public/image/w3path-favicon.png') }}" sizes="32x32" />
<style>
    .container {
        padding: 0.5%;
    }
</style>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Album aanmaken</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="upload_image_form" action="{{ route('storeAlbum') }}">
                        @csrf
                        <div class="col-md-12 mb-2">
                            <img id="image_preview_container" src="{{ asset('/images/image-preview.png') }}" alt="preview image" style="max-height: 150px;">
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <input type="file"accept="image/png, image/jpeg"  class="@error('image') is-invalid @enderror" name="image" placeholder="Choose image" id="image">
                                @error('image')
                                <span class="invalid-feedback" role="alert" style="width: 100px;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class=" col-md-2 col-form-label text-md-right">Titel</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="artist" class="@error('artist') is-invalid @enderror col-md-2 col-form-label text-md-right">Artiest</label>
                            <div class="col-md-6">
                                @foreach($artists as $artist)
                                <div>
                                    <td><input type="radio" name="artist" id="artist" value="{{$artist->id}}" @if($artist->id == 1) checked @endif>{{$artist->name}}</td>
                                </div>
                                
                                @endforeach
                                @error('artist')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="genre" class=" col-md-2 col-form-label text-md-right">Genre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('genre') is-invalid @enderror" name="genre">
                                @error('genre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Maak aan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection