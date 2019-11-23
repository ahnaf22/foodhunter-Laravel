  <!-- top offers -->
  <section>
        <div class="p-5 nearFood">
            <div class="row p-4">         
                <h4 class="border-bottom border-danger">Top Offers</h4>
            </div>


            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide card mr-2 nearbySwiper">
                        <div class="imgBox">
                            <img src="{{asset('frontend/assets/images/masala.jpg')}}" class="img-thumbnail" alt="">
                        </div>
                        <div class="nearbyDescription container text-center">
                            <h5 class="text-danger">Unlimited Kacchi</h5>
                            <i class="fas fa-store-alt text-danger"></i>
                            <span>Tradition BD</span><br>
                            <i class="fas fa-map-marker-alt text-danger mt-2"></i>
                            <span>Khilgaon,Taltola-Dhaka</span><br>
                            <i class="fas fa-money-bill-wave text-danger mt-2"></i>
                            <span>670 Taka</span><br>
                            <small class="text-muted mt-2">valid till: 25 May,2019</small>
                        </div>
                    </div>
                    <div class="swiper-slide card mr-2 nearbySwiper">
                        <div class="imgBox">
                            <img src="{{asset('frontend/assets/images/pizza.jpg')}}" class="img-thumbnail" alt="">
                        </div>
                        <div class="nearbyDescription container text-center">
                            <h5 class="text-danger">Buffet 40 Items</h5>
                            <i class="fas fa-store-alt text-danger"></i>
                            <span>Red Chilli Restaurant</span><br>
                            <i class="fas fa-map-marker-alt text-danger mt-2"></i>
                            <span>Meradia-Dhaka</span><br>
                            <i class="fas fa-money-bill-wave text-danger mt-2"></i>
                            <span>400 Taka</span><br>
                            <small class="text-muted mt-2">valid till: 19 May,2019</small>
                        </div>
                    </div>
                    <div class="swiper-slide card mr-2 nearbySwiper">
                        <div class="imgBox">
                            <img src="{{asset('frontend/assets/images/biryani.jpg')}}" class="img-thumbnail" alt="">
                        </div>
                        <div class="nearbyDescription container text-center">
                            <h5 class="text-danger">Food Platter</h5>
                            <i class="fas fa-store-alt text-danger"></i>
                            <span>Take A bite</span><br>
                            <i class="fas fa-map-marker-alt text-danger mt-2"></i>
                            <span>Banasree-Dhaka</span><br>
                            <i class="fas fa-money-bill-wave text-danger mt-2"></i>
                            <span>100 Taka</span><br>
                            <small class="text-muted mt-2">valid till: 25 June,2019</small>
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->
                <!-- <div class="swiper-pagination"></div> -->
                <!-- Add Arrows -->
                <!-- <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> -->
            </div>            
        </div>
    </section>


    @push('custom-scripts')
    <script>
        var swiper = new Swiper('.swiper-container', {
            effect: 'coverflow', 
            centeredSlides: true,
            slidesPerView: 'auto',
            loop:true,
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 0,
                modifier: 1,
                slideShadows : false,
            },    
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
           
        });
    </script>
    @endpush