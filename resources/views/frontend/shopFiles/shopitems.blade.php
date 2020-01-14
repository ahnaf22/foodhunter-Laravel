<!-- header -->
<div class=" container-fluid bg-white">
    <div class="row">
        <h4 class="mt-4 mb-4 ml-4 text-danger"><span class="badge badge-danger p-1">{{$shop->name}}</span> Food items</h4>
    </div>
</div>

<!-- main items -->
<div class="container-fluid">
            <div class="row bg-white mb-4 p-4">
                @foreach($shop->foods as $food)
                <div class="col-md-4 mt-4 col-lg-4 col-sm-6 col-xs-12">
                
                    <div class="shopOffer card ">
                        <a href="{{route('food.details',$food->id)}}" class="stretched-link">
                                <img
                                    src="{{asset('backend/assets/images/foods/'.$food->image)}}"
                                    class="img-thumbnail shopOfferImage card-img-top"
                                    alt="food"
                                />
                         </a>

                        <div class="card-body container text-center">
                            <h5 class="text-danger card-title card-header mb-3">
                                {{$food->title}}
                            </h5>
                            
                            <i
                                class="fas fa-money-bill-wave text-danger mt-2"
                            ></i>
                            <span>{{$food->price}} Taka</span><br />
    
                        </div>
                    </div>
                    
                </div>
                @endforeach
            </div>
    </div>
