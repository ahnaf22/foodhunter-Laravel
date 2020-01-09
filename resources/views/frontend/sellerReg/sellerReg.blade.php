@extends('frontend.layouts.master')

@section('content')

<!-- Register Panel -->
<div class=" registerWrapper container p-4 registerPanel d-flex align-items-center justify-content-center">
        
        <div class="card registerCard">
        <h3 class="card-header text-center py-4">
            <strong>We need some more info to make you a seller!</strong>
        </h3>

        <!--Card content-->
        <div class="card-body">
            <div>@include('frontend.partials.messages')</div>
            <!-- Form -->
            <form class="text-center" style="color: #757575;"  method="POST" action="{{ route('seller.registration.register') }}" >
            @csrf  
               
                <!-- first name -->
                <div class="form-group row md-form p-0">
                        <label for="name" class="col-md-4 col-form-label text-md-center">Shop Name :</label>

                        <div class="col-md-8">
                            <input id="name" 
                                   type="text" 
                                   class="form-control" 
                                   name="name" 
                                   required 
                                   autofocus
                                   placeholder="your shop name"
                                   >
                        </div>
                </div>
                   
                
                <!-- Shop Location -->
                <div class="form-group row md-form p-0">
                        <label for="location" class="col-md-4 col-form-label text-md-center">Shop Location:</label>

                        <div class="col-md-8">
                            <input id="location" 
                                   type="text" 
                                   class="form-control" 
                                   name="location" 
                                   required  
                                   placeholder="Enter where your shop is located"
                                   >
                        </div>
                </div>
                <!-- open_time -->
                <div class="form-group row md-form p-0">
                        <label for="open_time" class="col-md-4 col-form-label text-md-center">Opening time: </label>

                        <div class="col-md-8">
                            <input id="open_time" 
                                   type="text" 
                                   class="form-control" 
                                   name="open_time" 
                                   required 
                                   placeholder="shop opening time like :12 p.m, 11 a.m etc "
                                   >
                        </div>
                </div>

                 <!-- close_time -->
                 <div class="form-group row md-form p-0">
                        <label for="close_time" class="col-md-4 col-form-label text-md-center">Closing time:  </label>

                        <div class="col-md-8">
                            <input id="close_time" 
                                   type="text" 
                                   class="form-control" 
                                   name="close_time" 
                                   required 
                                   placeholder="closing time like : 9 p.m, 10 p.m etc "
                                   >
                        </div>
                </div>
               
                <!-- shop logo -->
                <div class="form-group row  p-0">
                        <label for="shop_logo" class="col-md-4 col-form-label text-md-center">Shop logo/image </label>

                        <div class="col-md-8">
                             <input id="shop_logo" 
                                    type="file"  
                                    class="form-control"  
                                    name="shop_logo"
                                    required
                                    >
                        </div>
                </div>

                 <!-- National Id card -->
                 <div class="form-group row  p-0">
                        <label for="nid_image" class="col-md-4 col-form-label text-md-center">Image of Your NID</label>

                        <div class="col-md-8">
                             <input id="nid_image" 
                                    type="file"  
                                    class="form-control"  
                                    name="nid_image" 
                                    required
                                    >
                        </div>
                </div>
                
                <!-- Register button -->
                <button
                    class="btn btn-outline-danger btn-rounded btn-md my-4"
                    type="submit"
                >
                    Enlist me as Seller
                </button>
            </form>
        </div>
        <div class="card-footer logincard-header text-center">
            <strong>© FoodHunter</strong>
        </div>
        </div>
    </div> 



@endsection