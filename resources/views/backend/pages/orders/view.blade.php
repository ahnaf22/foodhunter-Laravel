@extends('backend.layouts.master')

@section('content')


<div class="container marginTop p-4">
   <div class="card">
       <div class="card-header text-danger"><h5> Order id # {{$order->id}} <i class="fas fa-pizza-slice"></i></h5> </div>
        <div class="row p-4">
            <div class="col-7 border-right border-danger">
                @foreach($allbasket as $basket)
                 <p>
                     <span class="badge badge-danger p-2">{{$basket->food->title}}</span>
                     <span class="badge"> x {{$basket->quantity}}</span>
                     <span class="badge"> {{$basket->quantity*$basket->food->price}} taka </span>
                  </p>
                 @endforeach
            </div>
            <div class="col-5 p-4">
                  <p >Total Price: <span class="badge badge-danger">{{$totalprice}} taka</span></p>  
                  <p > <i class="fa fa-store"></i> :  <span class="badge badge-danger">{{$shopname}}</span></p> 
            </div>
        </div>
   </div>

   <div class="marginTop card">
       <div class="text-danger"><h5 class="card-header"> Order Informations <i class="fas fa-file-invoice"></i></h5> </div>
        <div class="row p-4">
            <div class="col-12 text-center">
                  <p >Orderer name: <span class="badge-danger p-2">{{$order->user->first_name}} {{$order->user->last_name}}</span></span></p>  
                  <p > order type:  <span class="badge-danger p-2">{{$order->order_type}}</span></p> 
                  @if(!is_null($order->dine_time))
                  <p > dinein time:  <span class="badge-danger p-2">{{$order->dine_time}}</span></p> 
                  @else
                  <p > delivery address:  <span class="badge-danger p-2">{{$order->delivery_address}}</span></p> 
                  @endif
                  
                  @if(!is_null($order->instructions))
                  <p><strong>instructions: <span class="badge-danger p-2">{{$order->instructions}}</span></p>
                  @endif
            </div>
        </div>
   </div>
    
</div>

@endsection