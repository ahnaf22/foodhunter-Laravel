@extends('frontend.layouts.master')

@section('content')


<section style="margin-top: 80px">
    <div class="bannerShortBottom">
        <div class="row m-0 d-flex align-items-center">
            <div class="col-7  text-center">
                <div class="bottomHeader">
                    <h3>Choose food</h3>
                    <h4>from our website</h4>
                </div>              
            </div>
            <div class="col-5">
                <div class="bottomBannerImgDiv">
                       <img src="{{asset('frontend/assets/images/foodshareImages/foodchose.jpg')}}" style="object-fit:contain" height="300px">
                </div>
            </div>
        </div>

        <div class="row m-0 d-flex align-items-center">
            <div class="col-5">
                <div class="bottomBannerImgDiv">
                       <img src="{{asset('frontend/assets/images/foodshareImages/order.jpg')}}" style="object-fit:contain" height="400px">
                </div>
            </div>
           <div class="col-7  text-center">
                <div class="bottomHeader">
                    <h3>Order Online</h3>
                    <p>select order type: <span class="badge badge-danger">dine in</span></p>
                    <p><span class="badge badge-danger">To Book a reservation </span></p>
                </div>              
            </div>
        </div>
         
        <div class="row m-0 d-flex align-items-center">
            <div class="col-7  text-center">
                <div class="bottomHeader">
                    <h4>Eat and enjoy in seller's House</h4>
                    <p>during reserved time</p>
                </div>              
            </div>
            <div class="col-5">
                <div class="bottomBannerImgDiv">
                       <img src="{{asset('frontend/assets/images/registerImages/register.jpg')}}" style="object-fit:contain" height="400px">
                </div>
            </div>
        </div>
        
    </div>
</section>

@endsection