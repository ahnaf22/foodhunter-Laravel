@extends('backend.layouts.master')

@section('content')

             <!-- create product form -->
             <div class="card">
                 <h4 class="card-header">Add a Food</h4>
                 <div class="card-body">
                        <form action="{{route('admin.food.store')}}"  method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="productTitle">Title</label>
                                <input type="text" class="form-control" placeholder="Enter title" name="title" >
                            </div>

                            <div class="form-group">
                                <label for="productDesc">Description</label>
                                <textarea name="description" class="form-control"  cols="30" rows="10" placeholder="Describe your product"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="productPrice">Price</label>
                                <input type="number" min="1" class="form-control" placeholder="Price" name="price" >
                            </div>
                              
                            
                            <div class="form-group">
                                <label>Select food category</label>
                                <select class="form-control" name="category_id" >
                                          <option disabled selected value> -- select an option -- </option>
                                        @foreach($categories as $parentCategory)
                                          <option value="{{$parentCategory->id}}">{{$parentCategory->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                    
                            <div class="form-group">
                                <label for="productImage">Insert a Food Image</label>

                                <div class="row">
                                   <div class="col-md-4">
                                        <input type="file"  class="form-control"  name="product_image">
                                   </div>
                                </div>
                                
                            </div>
                            
                            <button type="submit" class="btn btn-outline-danger">Add food</button>
                        </form>
                 </div>
               
             </div>
             

@endsection