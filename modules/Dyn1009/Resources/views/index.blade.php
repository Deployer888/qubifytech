@extends('dynamicpage::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('dynamicpage.name') !!}</p>
@endsection
