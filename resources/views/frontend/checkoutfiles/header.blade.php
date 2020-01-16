@php

  $onebasket=App\Basket::basketItems()->first();
  if(!is_null($onebasket))
  {
    $shopname=$onebasket->shop->name;
    $timing=$onebasket->shop->open_time ." to ". $onebasket->shop->close_time; 
    $shopid=$onebasket->shop->id;
  }

  $allbasket = App\Basket::basketItems();
  $totalprice=0;
  foreach($allbasket as $basket)
  {
      $totalprice+= $basket->food->price * $basket->quantity;
  }
@endphp
<div class="container marginTop p-4">
   <div class="card">
       <div class="card-header text-danger"><h5>Confirm Items <i class="fas fa-pizza-slice"></i></h5> </div>
        <div class="row p-4">
            <div class="col-7 border-right border-danger">
                @foreach($allbasket as $basket)
                 <p>
                     <span class="badge badge-danger p-2">{{$basket->food->title}}</span>
                     <span class="badge"> x {{$basket->quantity}}</span>
                     <span class="badge"> {{$basket->quantity*$basket->food->price}} taka </span>
                  </p>
                 @endforeach
                 <a href="{{route('basket')}}" class="anchortag"> <strong>change Items</strong></a>
            </div>
            <div class="col-5 p-4">
                  <p >Total Price: <span class="badge badge-danger">{{$totalprice}} taka</span></p>  
                  <p > <i class="fa fa-store"></i> :  <span class="badge badge-danger">{{$shopname}}</span></p>  
                  <p > <i class="fas fa-business-time"></i> :  <span class="badge badge-danger">{{$timing}}</span></p>  
            </div>
        </div>
   </div>
</div>