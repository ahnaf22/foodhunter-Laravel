@extends('frontend.layouts.master')


@section('content')

@php

  $onebasket=App\Basket::basketItems()->first();
  if(!is_null($onebasket))
  {
    $shopname=$onebasket->shop->name;
  }

  $totalprice=0;
@endphp



<div class="marginTop container text-center ">
    <div class="basketHeader text-danger card-header p-4 border-bottom rounded-pill border-danger"><h4><span><i class="fas fa-shopping-basket"></i></span> Food Basket</h4></div>
</div>

<div class="container  p-4">@include('frontend.partials.messages')</div>

@if(App\Basket::basketItems()->count() == 0)
<div class="container jumbotron text-center"> <h3>No items in Basket</h3> </div>
@else
<h4 class="card-header container text-center badge-danger">Shop Name: <a style="text-decoration:none; color:white" href="{{route('shops.details',$onebasket->shop_id)}}">{{$shopname}}</a></h4>
<div class="container mt-4 table-responsive">
      <table class="table text-center">
          <thead class="thead-primary">
            <tr>
                <th>No.</th>
                <th>Food item</th>
                <th>Food image</th>
                <th>Unit price</th>
                <th>quantity</th>
                <th>Subtotal</th>
                <th>Remove item</th>
            </tr>
          </thead>
          @foreach(App\Basket::basketItems() as $basket)
          <tr>
              <td>{{$loop->index+1}}</td>
              <td><a class="anchortag" target="_blank" href="{{route('food.details',$basket->food->id)}}">{{$basket->food->title}}</a></td>
              <td><img src="{{asset('backend/assets/images/foods/'.$basket->food->image)}}" width="120px" height="100px"></td>
              <td>{{$basket->food->price}} Taka</td>
              <td >
                  <form class="" action="{{route('basket.update')}}" method="POST">
                      @csrf 
                      <input class="border-0 text-center"type="number" name="quantity" min='1' value="{{$basket->quantity}}">
                      <input type="hidden" name="basket_id" value="{{$basket->id}}">
                      <button class="btn btn-sm btn-danger" type="submit">update</button>
                  </form>
              </td>
              <td>{{$basket->food->price * $basket->quantity}} taka</td>
              <td>
                <form class="" action="{{route('basket.delete')}}" method="POST">
                        @csrf 
                        <input type="hidden" name="basket_id" value="{{$basket->id}}">
                        <button class="btn btn-sm btn-danger" type="submit">delete</button>
                </form>
              </td>
          </tr>
          @php
             $totalprice+=$basket->food->price * $basket->quantity;
          @endphp

          @endforeach
          <tr>
            <td colspan="4"></td>
            <td class="text-right">Total Price: </td>
            <td> {{$totalprice}} Taka</td>
          </tr>
      </table>

      <div class="container text-center p-4">
            <a href="{{route('shops')}}" class="btn btn-danger">Continue Shopping</a>
            <a href="{{route('checkout')}}" class="btn btn-danger">Checkout</a>
      </div>
</div>
@endif

@endsection