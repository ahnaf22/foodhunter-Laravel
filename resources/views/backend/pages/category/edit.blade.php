@extends('backend.layouts.master')

@section('content')

             <!-- create product form -->
             <div class="card">
                 <h4 class="card-header">Edit category id: {{$category->id}}</h4>
                 <div class="card-body">
                        <form action="{{route('admin.category.update',$category->id)}}"  method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <div class="form-group">
                                <label >Category Name</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$category->name}}">
                            </div>

                            <div class="form-group">
                                <label >Description</label>
                                <textarea name="description" class="form-control"  cols="30" rows="10" placeholder="Describe your category" > {{$category->description}} </textarea>
                            </div>

                            <div class="form-group">
                                <label>Parent Category</label>
                                <select class="form-control" name="parent_id" >
                                          <option disabled selected value> -- select an option -- </option>
                                        @foreach($parentCat as $parentCategory)
                                          <option value="{{$parentCategory->id}}" 
                                                  {{ $parentCategory->id == $category->parent_id ? 'selected':'' }}>
                                                  {{$parentCategory->name}}
                                          </option>
                                        @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label >old icon</label> <hr>
                                <img  class="img-responsive" src="{{ asset('backend/assets/images/categoryImages/'.$category->image) }}" width="50" height="50">                      
                                <hr>
                                <label >Choose a new icon</label>
                                <input type="file"  class="form-control"  name="category_image" >                                                         
                            </div>
                            
                            <button type="submit" class="btn btn-outline-danger">Update Category</button>
                        </form>
                 </div>
               
             </div>
             

@endsection