@extends('backend.layouts.master')
 
@section('content')

<div class="container" >
     
    <div class="card">
              <div class="card-header">
                   <center>
                    <img src="{{asset('backend/assets/images/defaultImages/defaultUser.png')}}" width="140" height="140" class="rounded-circle img-lg"></a>
                    <h4 >{{ $user->first_name." ".$user->last_name}}</h4>
                                    @if($user->is_seller == 1)
                                    <span class="badge badge-primary">Seller account</span>
                                    @elseif($user->is_offerer == 1)
                                     <span class="badge badge-warning">Offerer Account</span>
                                     @elseif($user->is_admin == 1)
                                     <span class="badge badge-success">Admin Account</span>
                                     @else
                                     <span class="badge badge-danger">User</span>
                                    @endif
                    </center>
              </div>
             <div class="card-body"> 
                   <div class="row">
                        <div class="col-md-4">
                            <h4>Email:</h4>
                            <span>{{$user->email}}</span>
                        </div>
                        <div class="col-md-4">
                            <h4>Address:</h4>
                            <span>{{$user->address}}</span>
                        </div>
                        <div class="col-md-4">
                            <h4>Phone:</h4>
                            <span>{{$user->phone}}</span>
                        </div>
                   </div>
                      
                    
                </div>
                <div class="card-footer text-center">
                   <button class="btn btn-outline-danger btn-md">Update Info</button>
                </div>
            </div>
        
    </div>

@endsection