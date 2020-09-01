@extends('layouts.app')

@section('content')


<div id="app">
    <albumshop :albums='{!! json_encode($albums) !!}'></albumshop>
</div>

@endsection