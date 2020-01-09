@extends('backend.layouts.master')

@section('content')

             <div class="card">
                 <h4 class="card-header">All foods by your shop</h4>
                 <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Food title</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                            
                            @foreach($foods as $food)
                            <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{$food->title}}</td>
                               <td><img src="{{ asset('backend/assets/images/foods/'.$food->image) }}" ></td>
                               <td>{{$food->description}}</td>
                               <td>{{$food->category->name}}</td>
                               
                               <td>
                                   <a href="{{route('admin.food.edit', $food->id)}}" class="btn btn-success">Edit Item</a>
                                   <a href="#deleteModal{{$food->id}}" data-toggle="modal" class="btn btn-danger">Delete Item</a>
                               </td>
                               <!-- deletemodal -->
                                <div class="modal fade" id="deleteModal{{$food->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sure to delete the food?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Food name: {{$food->title}}</p>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('admin.food.delete',$food->id)}}"  method="post">
                                                     @csrf
                                                     <button type="sumbit" class="btn btn-danger" >Delete Permanently</button>
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