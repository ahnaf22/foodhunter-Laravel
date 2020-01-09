<section>
    <div class="bannerShortBottom">
        <div class="row m-0">
            <div class="col-md-8 col-lg-8 col-sm-12 text-center bottomheaderParent">
                <div class="bottomHeader">
                    <h3>What about selling your </h3>
                    <h2>SPECIAL FOOD ITEM ?</h2>
                    <button  
                          class="btn btn-outline-danger btn-md mt-4"
                          onclick="window.location='{{ route('seller.registration') }}'"
                          >
                            Start Selling!
                    </button>
                </div>              
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="bottomBannerImgDiv">
                       <img src="{{asset('frontend/assets/images/bannerBottom/bannerBottom.png')}}">
                </div>
            </div>
        </div>
    </div>
</section>