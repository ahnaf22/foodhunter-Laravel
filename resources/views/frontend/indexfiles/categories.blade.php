
<div class="p-4">
    <div class="row p-4">         
        <h4 class="border-bottom border-danger">Categories</h4>
    </div>

    <div class="row p-4">
        @foreach($categories as $category)
        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12 ">
            <div class="card text-white categoryCard m-2">
                
                <div class="generalimagebox">
                    <a href="{{route('foods.category',$category->id)}}" class="stretched-link">
                        <img src="{{asset('backend/assets/images/categoryImages/'.$category->image)}}" class="card-img">
                    </a>
                </div>
                
                <div class="card-img-overlay categoryOverlay d-flex flex-column align-items-start">
                    <h5 class="card-title mt-auto ml-auto">{{$category->name}}</h5>
                </div>
            </div>
        </div>
        @endforeach        
    </div>
    
</div>