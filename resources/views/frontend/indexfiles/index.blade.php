@extends('frontend.layouts.master')

@section('content')
   
   @include('frontend.indexfiles.headersection')
   @include('frontend.partials.searchbar')
   @include('frontend.indexfiles.dawatBanner')
   @include('frontend.indexfiles.categories')
   @include('frontend.indexfiles.topoffers')
   @include('frontend.indexfiles.offersnearby')
   @include('frontend.indexfiles.banner')
   @include('frontend.indexfiles.homemade')
   @include('frontend.indexfiles.bannerBottom')

@endsection