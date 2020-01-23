@if(count($shops) < 1)
    <div class="jumbotron text-danger"><h2>no shop found named: {{$search}}</h2></div>
@else
 
 <!-- foreach start -->

 @foreach($shops as $shop)
                <div class="col-md-4 mt-4 col-lg-3 col-sm-6 col-xs-12">
                     
                    
                    <div class="shopOffer card ">
                        <a href="{{route('shops.details',$shop->id)}}" class="stretched-link">
                                <img
                                    src="{{asset('backend/assets/images/shoplogos/'.$shop->shop_logo)}}"
                                    class="img-thumbnail shopOfferImage card-img-top"
                                    alt="food"
                                />
                         </a>

                        <div class="card-body container text-center">
                            <h5 class="text-danger card-title card-header mb-3">
                                {{$shop->name}}
                            </h5>
    
                            <i
                                class="fas fa-map-marker-alt text-danger mt-2"
                            ></i>
                            <span>{{$shop->location}}</span><br />
                            <span class="text-muted p-2">Open from: {{$shop->open_time}} to {{$shop->close_time}} </span>
                        
                        </div>
                    </div>
                
                    
                </div>
@endforeach
<!-- foreach end -->

@endif