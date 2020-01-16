@extends('backend.layouts.master')
 
@section('content')

<div class="container" >
     
    <div class="card">
              <div class="card-header">
                   <center>
                    <img src="{{asset('backend/assets/images/shoplogos/'.$shop->shop_logo)}}" width="140" height="140" class="rounded-circle img-lg"></a>
                    <h4 >{{$shop->name}}</h4>
                    
                    <span class="badge badge-danger">{{$shop->location}}</span>
        
                    </center>
              </div>
             <div class="card-body"> 
                   <div class="row">
                        <div class="col-md-4">
                            <h4>Shop owner:</h4>
                            <span>{{$shop->user->first_name}}</span>
                        </div>
                        <div class="col-md-4">
                            <h4>Opening time:</h4>
                            <span>{{$shop->open_time}}</span>
                        </div>
                        <div class="col-md-4">
                            <h4>Closing time:</h4>
                            <span>{{$shop->close_time}}</span>
                        </div>
                        <div class="col-md-4 mt-2">
                            <h4>Phone:</h4>
                            <span>{{$shop->user->phone}}</span>
                        </div>
                   </div>
                      
                    
                </div>
                <div class="card-footer text-center">
                   <button class="btn btn-outline-danger btn-md">Update Info</button>
                </div>
            </div>
        
    </div>

@endsection