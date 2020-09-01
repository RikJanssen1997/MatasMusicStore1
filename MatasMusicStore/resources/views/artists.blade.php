@extends('layouts.app')

@section('content')


<div id="app">
    <artisttable :artists='{!! json_encode($artists) !!}'></artisttable>
</div>

@endsection