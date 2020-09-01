@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Artiest aanpassen</div>

                <div class="card-body">
                    <form action="{{ route('storeArtist') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class=" col-md-4 col-form-label text-md-right">Naam</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                                @error('name')
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