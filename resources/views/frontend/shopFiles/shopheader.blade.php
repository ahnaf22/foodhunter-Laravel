 <!-- shop Image -->
 <div class="detailsShopHeader marginTop">
            <div class="shopHeaderOverlay container-fluid p-0">
                <div
                    class="row shopHeaderInner d-flex align-items-center justify-content-center m-0"
                >
                    <div class="text-center">
                        <img
                            src="{{asset('backend/assets/images/shoplogos/'.$shop->shop_logo)}}"
                            class="shopLogo
                        rounded-circle"
                            alt="shop_image"
                        />
                        <div class="shopDescription">
                            <h3>{{$shop->name}}</h3>
                            <h5>{{$shop->location}}</h5>
                            <h5>phone: {{$shop->user->phone}}</h5>
                            <span class="badge p-2 mt-2  text-danger bg-white"><h6>remains open from {{$shop->open_time}} to {{$shop->close_time}}</h6></span><br />
                        </div>
                    </div>
                </div>
           </div>
</div>