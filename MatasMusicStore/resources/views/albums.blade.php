@extends('layouts.app')

@section('content')


<div id="app">
    <albumtable :albums='{!! json_encode($albums) !!}'></albumtable>
</div>

@endsection