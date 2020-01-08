@extends('backend.layouts.master')
 <!-- here we will show all the categories in the admin page to edit and delete -->
@section('content')

             <!-- create categories data -->
             <div class="card">
                 <h4 class="card-header">All Categories</h4>
                 <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Title</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Parent Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                            
                            @foreach($categories as $category)
                            <tr>
                               <td>#</td>
                               <td>{{$category->name}}</td>
                               <td><img src="{{ asset('backend/assets/images/categoryImages/'.$category->image) }}" ></td>
                               <td>{{$category->description}}</td>
                               <td>
                                    @if($category->parent_id == NULL)
                                        Main Category
                                    @else
                                       {{$category->parent->name}}
                                    @endif
                               </td>
                               <td>
                                   <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-success">Edit Item</a>
                                   <a href="#deleteModal{{$category->id}}" data-toggle="modal" class="btn btn-danger">Delete Item</a>
                               </td>
                               <!-- deletemodal -->
                                <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sure to delete the category?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>category name: {{$category->name}}</p>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('admin.category.delete',$category->id)}}"  method="post">
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