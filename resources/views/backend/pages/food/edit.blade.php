@extends('backend.layouts.master')

@section('content')

             <div class="card">
                 <h4 class="card-header">Edit Food : {{$food->title}}</h4>
                 <div class="card-body">
                        <form action="{{route('admin.food.update',$food->id)}}"  method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="productTitle">Title</label>
                                <input type="text" class="form-control" placeholder="Enter title" 
                                       name="title" 
                                       value="{{$food->title}}"
                                       >
                            </div>

                            <div class="form-group">
                                <label for="productDesc">Description</label>
                                <textarea name="description" class="form-control"  cols="30" rows="10" 
                                          placeholder="Describe your product">
                                        {{$food->description}}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="productPrice">Price</label>
                                <input type="number" min="1" class="form-control" placeholder="Price" 
                                       name="price" 
                                       value="{{$food->price}}"
                                       >
                            </div>
                              
                            
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category_id" >
                                          <option disabled selected value> -- select an option -- </option>
                                        @foreach($categories as $parentCategory)
                                          <option value="{{$parentCategory->id}}" 
                                                  {{ $parentCategory->id == $food->category->id ? 'selected':'' }}>
                                                  {{$parentCategory->name}}
                                          </option>
                                        @endforeach
                                </select>
                    
                            <div class="form-group">
                                <label >old icon</label> <hr>
                                <img  class="img-responsive" src="{{ asset('backend/assets/images/foods/'.$food->image) }}" width="50" height="50">                      
                                <hr>
                                <label >Choose a new icon</label>
                                <input type="file"  class="form-control"  name="product_image" >                                                         
                            </div>
                            
                            <button type="submit" class="btn btn-outline-danger">Update food info</button>
                        </form>
                 </div>
               
             </div>
             
        
@endsection
