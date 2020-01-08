@extends('backend.layouts.master')

@section('content')

             <!-- create product form -->
             <div class="card">
                 <h4 class="card-header">Add a Category</h4>
                 <div class="card-body">
                        <form  action="{{route('admin.category.store')}}"  method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <div class="form-group">
                                <label >Category Name</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="name">
                            </div>

                            <div class="form-group">
                                <label >Description</label>
                                <textarea name="description" class="form-control"  cols="30" rows="10" placeholder="Describe your category" > </textarea>
                            </div>

                            <div class="form-group">
                                <label>Parent Category</label>
                                <select class="form-control" name="parent_id" >
                                          <option disabled selected value> -- select an option -- </option>
                                        @foreach($parentCat as $parentCategory)
                                          <option value="{{$parentCategory->id}}">{{$parentCategory->name}}</option>
                                        @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label >Insert a category Image</label>

                                <div class="row">
                                   <div class="col-md-4">
                                        <input type="file"  class="form-control"  name="category_image" >
                                   </div>
                                </div>
                                
                            </div>
                            
                            <button type="submit" class="btn btn-outline-danger">Add Category</button>
                        </form>
                 </div>
               
             </div>
             

@endsection