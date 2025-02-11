<div class="homeMadeDiv">
            <div class="row bg-white mb-4">
            
              @foreach($homeFoods as $food)
                
              <div class="col-md-4 mt-2 col-lg-3 col-sm-6 col-xs-12">
                
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
                            <i class="fas fa-store-alt text-danger"></i>
                            <span>{{$food->shop->name}}</span><br />
                            <i
                                class="fas fa-map-marker-alt text-danger mt-2"
                            ></i>
                            <span>{{$food->shop->location}}</span><br />
                            <i
                                class="fas fa-money-bill-wave text-danger mt-2"
                            ></i>
                            <span>{{$food->price}} Taka</span><br />
    
                        </div>
                    </div>
                    
                </div>
               @endforeach
                
            </div>
            <div class="text-right text-danger"><a  class="anchortag" href="{{route('food.homemade')}}">See more</a></div>
        </div>