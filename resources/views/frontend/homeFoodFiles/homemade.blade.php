@extends('frontend.layouts.master')


@section('content')

   <div class="container text-center p-4 marginTop bg-white"> <h2>Home Made foods</h2></div>
   <hr>

    <div class="container  p-4">@include('frontend.partials.messages')</div>
    @include('frontend.homeFoodFiles.searchbar')
   <!-- homemade food Items-->
   <div class="container-fluid">
            <div class="row bg-white mb-4" id="foodContainer">
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
            </div>
    </div>

@endsection


@push('custom-scripts')
<Script>

          function searchFood()
          {

              var searchValue=$("#searchFoodValue").val();
              var url= "{{route('search.foods')}}";
              //alert(searchValue);
              
              $.get(url, 
                { 
                    search_string: searchValue

                })
              .done(function( data ) {
                  
                  $("#foodContainer").html(data);
                  
                  
              });
              
          }

</Script>
@endpush