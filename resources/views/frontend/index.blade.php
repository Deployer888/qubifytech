@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')

{{-- Static sections (original) --}}
@include('frontend.home.hero')
@include('frontend.home.about')
@include('frontend.home.services')
@include('frontend.home.solutions')
@include('frontend.home.portfolio')
@include('frontend.home.testimonials')
@include('frontend.home.cta')
@include('frontend.home.contact')

@endsection