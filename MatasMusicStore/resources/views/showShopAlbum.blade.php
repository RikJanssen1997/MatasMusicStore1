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
                <a href="{{route('buyAlbum', ['id' => $album->id])}}" class="ml-5 row d-flex justify-content-center btn btn-success">Koop nu</a>
            </div>
 
        </div>
        <!--Grid column-->
    

    </div>
</div>
<div id="app">
    <songTable :songs='{!! json_encode($album->songs) !!}'></songTable>
</div>


@endsection