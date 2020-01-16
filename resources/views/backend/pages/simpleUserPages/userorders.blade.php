@extends('backend.layouts.master')
 
@section('content')

<div class="container" > 
    <div class="card">
            @if($orders->count() == 0)
            <div class="container jumbotron text-center"> <h3>you havent ordered anything</h3> </div>
            @else
            <h4 class="card-header container text-center bg-danger text-white"><strong>Your Orders</strong></h4>
            <div class="mt-4 table-responsive">
                <table class="table text-center">
                    <thead class="thead-primary">
                        <tr>
                            <th>No.</th>
                            <th>Order Id</th>
                            <th>total price</th>
                            <th>order type</th>
                            <th>dine time</th>
                            <th>delivery address</th>
                            <th>status</th>
                            <th>confirmation</th>
                            <th>completion</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$order->id}}</td>
                        <td>{{$order->total_price}} tk</td>
                        <td>{{$order->order_type}}</td>
                        @if(!is_null($order->dine_time))
                        <td>{{$order->dine_time}}</td>
                        @else
                        <td>N/A</td>
                        @endif

                        @if(!is_null($order->delivery_address))
                        <td>{{$order->delivery_address}}</td>
                        @else
                        <td>N/A</td>
                        @endif
                       
                        @if($order->is_seenbyseller)
                        <td><span class="badge badge-success">seen</span></td>
                        @else
                        <td><span class="badge badge-danger">not seen</span></td>
                        @endif

                        @if($order->is_confirmed)
                        <td><span class="badge badge-success">confirmed</span></td>
                        @else
                        <td><span class="badge badge-danger">pending</span></td>
                        @endif

                        @if($order->is_completed)
                        <td><span class="badge badge-success">completed</span></td>
                        @else
                        <td><span class="badge badge-danger">pending</span></td>
                        @endif

                        <td>
                            <form action="{{route('order.view')}}"  method="post">
                                @csrf
                                <input type="hidden" name="order_id" value="{{$order->id}}">
                                <button type="sumbit" class="btn btn-success" >view</button>
                            </form>
                            <br>
                           @if(!$order->is_completed)
                           <a href="#deleteModal{{$order->id}}" data-toggle="modal" class="btn btn-danger">cancel</a> 
                           @endif
                        </td>
                         <!-- deletemodal -->
                         <div class="modal fade" id="deleteModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sure to cancel order?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        
                                        
                                            <div class="modal-footer">
                                                <form action="{{route('order.delete')}}"  method="post">
                                                     @csrf
                                                     <input type="hidden" name="order_id" value="{{$order->id}}">
                                                     <button type="sumbit" class="btn btn-danger" >cancel now</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </tr>
                    @endforeach
                </table>
            </div>
            @endif
    
    </div>     
</div>

@endsection