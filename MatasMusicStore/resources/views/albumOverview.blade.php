@extends('layouts.app')

@section('content')
<!--Grid row-->
<div class="row d-flex justify-content-center">

    <!--Grid column-->
    <div class="col-md-6">

        <div class="d-flex flex-row bd-highlight mb-3">
            <div>
                @if($album->artwork == null)
                <img id="image" src="{{ asset('/images/image-preview.png') }}" alt="preview image" style="max-height: 150px;">
                @else
                <img id="image" src="{{$album->artwork}}" alt="preview image" style="max-height: 150px;">
                @endif
            </div>
            <div class="align-middle">
                <div class="ml-5 row">
                    <label>Titel:&nbsp;</label>
                    <p>{{$album->title}}</p>
                </div>
                <div class="ml-5 row">
                    <label>Genre:&nbsp;</label>
                    <p>{{$album->genre}}</p>
                </div>
                <div class="ml-5 row">
                    <label>Artiest:&nbsp;</label>
                    <p>{{$album->artist->name}}</p>
                </div>
            </div>

        </div>
        <!--Grid column-->


    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Song aanmaken</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="upload_image_form" action="{{ route('storeSong', $album) }}">
                        @csrf
                        <div class="col-md-1">
                            <div class="form-group">
                                <input type="file" accept=".mp3" class="@error('song') is-invalid @enderror" name="song" placeholder="Choose file" id="song">
                                @error('song')
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
                            <label for="position" class=" col-md-2 col-form-label text-md-right">Positie</label>
                            <div class="col-md-6">
                                <input type="number" min="1" value="1" class="w-100 form-control @error('position') is-invalid @enderror" name="position">
                                @error('position')
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
<div id="app">
    <songTable :songs='{!! json_encode($album->songs) !!}'></songTable>
</div>


@endsection