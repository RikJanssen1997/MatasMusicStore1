@extends('layouts.app')

@section('content')


<div id="app">
    <songcollection :songs='{!! json_encode($songs) !!}'></songcollection>
</div>

@endsection