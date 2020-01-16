@extends('backend.layouts.master')
 <!-- here we will show all the users in the admin page to edit and delete -->
@section('content')

             <!-- create users data -->
             <div class="card">
                 <h4 class="card-header">All Users</h4>
                 <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>User Id</th>
                                    <th>Status</th>
                                    <th>Email verified</th>
                                    <th>Account Type</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>ip Address</th>
                                    <!-- <th>Actions</th> -->
                                </tr>
                            </thead>

                            <tbody>
                            
                            @foreach($users as $user)
                            <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{$user->first_name." ".$user->last_name}}</td>
                               <td>{{$user->id}}</td>
                               <td>
                                    @if($user->is_active == 0)
                                     <span class="badge badge-danger">offline</span>
                                    @else
                                     <span class="badge badge-success">online</span>
                                    @endif
                               </td>
                               <td>
                                    @if($user->is_email_verified == 0)
                                     <span class="badge badge-danger">email unverified</span>
                                    @else
                                     <span class="badge badge-success">verified</span>
                                    @endif
                               </td>
                               <td>
                                    @if($user->is_seller == 1)
                                     <span class="badge badge-primary">Seller account</span>
                                    @elseif($user->is_offerer == 1)
                                     <span class="badge badge-warning">Offerer Account</span>
                                     @elseif($user->is_admin == 1)
                                     <span class="badge badge-success">Admin Account</span>
                                     @else
                                     <span class="badge badge-danger">User</span>
                                    @endif
                               </td>
                               <td>{{$user->phone}}</td>
                               <td>{{$user->address}}</td>
                               <td>{{$user->ip_address}}</td>
                               
                            </tr>
                            @endforeach

                            </tbody>
                        </table>


                       
                 </div>
             </div>
             

@endsection
