@extends('frontend.layouts.master')


@section('content')

<!-- food Image -->
<div class="detailsFoodImage mt-4 p-0">
      <img src="{{asset('backend/assets/images/foods/'.$food->image)}}" alt="food Image" />
</div>

<!-- food details and similar foods -->
<div class="container">
      <div class="row">
           @include('frontend.foodDetailFiles.foodDescription')
           @include('frontend.foodDetailFiles.similarFromShop')
      </div>   
</div>

<!-- comment and review section -->
 @include('frontend.foodDetailFiles.comments')


@endsection

