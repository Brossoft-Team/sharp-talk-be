@extends('sharp::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('sharp.name') !!}</p>
@endsection
