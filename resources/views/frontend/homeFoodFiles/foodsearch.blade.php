@if(count($foods) < 1)
    <div class="jumbotron text-danger"><h2>no food found named: {{$search}}</h2></div>
@else
 

@foreach($foods as $food)
                <div class="col-md-4 mt-2 col-lg-4 col-sm-6 col-xs-12">
                
                    <div class="shopOffer card ">
                        <a href="{{route('food.details',$food->id)}}" >
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
                            
                            @include('frontend.partials.addtobasket')
            
                        </div>
                    </div>
                    
                </div>
@endforeach

@endif