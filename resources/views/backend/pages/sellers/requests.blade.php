@extends('backend.layouts.master')
 <!-- here we will show all the seller requests in the admin page to edit and delete -->
@section('content')

             <!-- create Seller requests data -->
             <div class="card">
                 <h4 class="card-header">Pending Seller Requests</h4>
                 <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Phone</th>
                                    <th>User Address</th>
                                    <th>Shop Name</th>
                                    <th>Shop location</th>
                                    <th>Shop logo</th>
                                    <th>User NID</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                            
                            @foreach($users as $user)
                            <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{$user->first_name." ".$user->last_name}}</td>
                               <td>{{$user->phone}}</td>
                               <td>{{$user->address}}</td>
                               <td>{{$user->shop->name}}</td>
                               <td>{{$user->shop->location}}</td>
                               <td><img src="{{ asset('backend/assets/images/shoplogos/'.$user->shop->shop_logo) }}" ></td>
                               <td><img src="{{ asset('backend/assets/images/sellerNid/'.$user->nid) }}" ></td>
                               <td>
                                   <a href="{{route('admin.category.edit', $user->id)}}" class="btn btn-success">Approve</a>
                                   <a href="#deleteModal{{$user->id}}" data-toggle="modal" class="btn btn-danger">Reject</a>
                               </td>
                               <!-- deletemodal -->
                               <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sure to reject user?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>User name: {{$user->first_name." ".$user->last_name}}</p>
                                                <p>Shop name: {{$user->shop->name}}</p>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('admin.category.delete',$user->id)}}"  method="post">
                                                     @csrf
                                                     <button type="sumbit" class="btn btn-danger" >Confirm rejection</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>


                       
                 </div>
             </div>
             

@endsection
