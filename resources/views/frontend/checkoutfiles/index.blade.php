@extends('frontend.layouts.master')

@section('content')

@php

  $onebasket=App\Basket::basketItems()->first();
  if(!is_null($onebasket))
  {
    $shopname=$onebasket->shop->name;
    $shopid=$onebasket->shop->id;
  }

  $allbasket = App\Basket::basketItems();
  $totalprice=0;
  foreach($allbasket as $basket)
  {
      $totalprice+= $basket->food->price * $basket->quantity;
  }
@endphp

  @include('frontend.checkoutfiles.header')
  @include('frontend.checkoutfiles.orderinfo')
@endsection