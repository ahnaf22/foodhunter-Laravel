<div class="col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">

               <!-- Money and time -->
              <div class="moneyandtimeInner">
                <span>
                  <i class="fas fa-money-bill-wave text-danger mt-2"></i> 600
                  Taka</span
                >
                <br />
                <span
                  ><i class="far fa-clock text-danger"></i> valid till : 21
                  June, 2019</span
                >
              </div>

              <!-- similar from shop -->
              <div class="similarFromShop">
                <p>
                  <strong
                    >Other offers From
                    <span class="text-danger">Tradition BD</span></strong
                  >
                </p>
                <div class="similarFromShopSlideContainer">
                  <div class="swiper-wrapper">
                    
                  <!-- sildes -->
                    <div class="swiper-slide similarFromshopSlide">
                      <div class="card p-0">
                        <img
                          src="{{asset('frontend/assets/images/pizza.jpg')}}"
                          class="card-img-top similarFromShopImage img-thumb img-responsive"
                          alt="food"
                        />
                      </div>
                      <div class="card-body p-0 text-center">
                        <h6 class="card-title">Pizza unlimited</h6>
                        <span class="card-text">
                          <i
                            class="fas fa-money-bill-wave text-danger mt-2"
                          ></i>
                          600 Taka</span
                        >
                        <br />
                        <small class="card-text text-muted"
                          ><i class="far fa-clock text-muted"></i>
                          21 June, 2019</small>
                        
                      </div>
                    </div>

                    <div class="swiper-slide similarFromshopSlide">
                      <div class="card p-0">
                        <img
                          src="{{asset('frontend/assets/images/masala.jpg')}}"
                          class="card-img-top similarFromShopImage img-thumb img-responsive"
                          alt="food"
                        />
                      </div>
                      <div class="card-body p-0 text-center">
                        <h6 class="card-title">Spicy Foods</h6>
                        <span class="card-text">
                          <i
                            class="fas fa-money-bill-wave text-danger mt-2"
                          ></i>
                          400 Taka</span
                        >
                        <br />
                        <small class="card-text text-muted"
                          ><i class="far fa-clock text-muted"></i>
                          21 June, 2019</small>
                        
                      </div>
                    </div>

                    <div class="swiper-slide similarFromshopSlide">
                      <div class="card p-0">
                        <img
                          src="{{asset('frontend/assets/images/masala.jpg')}}"
                          class="card-img-top similarFromShopImage img-thumb img-responsive"
                          alt="food"
                        />
                      </div>
                      <div class="card-body p-0 text-center">
                        <h6 class="card-title">Fast foods</h6>
                        <span class="card-text">
                          <i
                            class="fas fa-money-bill-wave text-danger mt-2"
                          ></i>
                          200 Taka</span
                        >
                        <br />
                        <small class="card-text text-muted"
                          ><i class="far fa-clock text-muted"></i>
                          21 June, 2019</small>
                        
                      </div>
                    </div>

                    
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