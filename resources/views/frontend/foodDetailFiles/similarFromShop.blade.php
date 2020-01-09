<div class="col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">

               <!-- Money and time -->
              <div class="moneyandtimeInner">
                <span>
                  <i class="fas fa-money-bill-wave text-danger mt-2"></i> {{$food->price}}
                  Taka</span
                >
                <br />
                <span
                  ><i class="far fa-clock text-danger"></i> available</span
                >
              </div>

              <!-- similar from shop -->
              <div class="similarFromShop">
                <p>
                  <strong
                    >Other offers From
                    <span class="text-danger">{{$food->shop->name}}</span></strong
                  >
                </p>
                <div class="similarFromShopSlideContainer">
                  <div class="swiper-wrapper">
                    
                  <!-- sildes -->
                   @foreach($morefoods as $shopfood)
                    <div class="swiper-slide similarFromshopSlide">
                      <div class="card p-0">
                      <a href="{{route('food.details',$shopfood->id)}}" class="card stretched-link">
                        <img
                          src="{{asset('backend/assets/images/foods/'.$shopfood->image)}}"
                          class="card-img-top similarFromShopImage img-thumb img-responsive"
                          alt="food"
                        />
                      </a>
                      </div>
                      <div class="card-body p-0 text-center">
                        <h6 class="card-title">{{$shopfood->title}}</h6>
                        <span class="card-text">
                          <i
                            class="fas fa-money-bill-wave text-danger mt-2"
                          ></i>
                          {{$shopfood->price}} Taka</span
                        >
                        <br />
                        <small class="card-text text-muted"
                          ><i class="far fa-clock text-muted"></i>
                          available</small>
                        
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>


    @push('custom-scripts')
    <script>
        var swiper = new Swiper(".similarFromShopSlideContainer", {
        slidesPerView: 2,
        spaceBetween: 30
      });
    </script>
    @endpush