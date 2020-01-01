@extends('frontend.layouts.master')

@section('content')
<div class="loginWrapper row m-0">
      <div class="col-lg-5 col-sm-5 col-xs-5 loginSliderPanel">
        <div class="loginswiper-container swiper-no-swiping">
          <div class="swiper-wrapper">
            <div class="swiper-slide loginSlide1">
              <div class="loginSlideInner">
                <div class="loginSlideText">
                  <h1>
                    Delicious foods
                  </h1>
                  <h4>are waiting for you!</h4>
                </div>
              </div>
            </div>
            <div class="swiper-slide loginSlide2">
              <div class="loginSlideInner">
                <div class="loginSlideText">
                  <h1>Thousands of food offers</h1>
                  <h4>near you</h4>
                </div>
              </div>
            </div>
            <div class="swiper-slide loginSlide3">
              <div class="loginSlideInner">
                <div class="loginSlideText">
                  <h1>
                    Lets start Hunting!
                  </h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- slier overlay -->
      <div class="col-lg-1 col-sm-1 col-xs-1 sliderOverlay">
        <div class="upperOverlay"></div>
        <div class="lowerOverlay"></div>
      </div>

      <!-- form -->
      <div
        class="col-lg-6 col-sm-6 col-xs-6 loginPanel d-flex align-items-center justify-content-center"
      >
        <div class="card loginCard">
          <h3 class="card-header logincard-header text-center py-4">
            <strong>Sign in</strong>
          </h3>

          <!--Card content-->
          <div class="card-body">
            <!-- Form -->
            <form class="text-center" style="color: #757575;"  method="POST" action="{{ route('login') }}" >
            @csrf  
            <!-- Email -->
              <div class="md-form">
                <input id="email" 
                       type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       name="email" 
                       placeholder="Enter Your Email"
                       value="{{ old('email') }}" required 
                       autocomplete="email" autofocus />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <!-- Password -->
              <div class="md-form">
                <input
                    id="password" 
                    type="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    name="password" required 
                    autocomplete="current-password"
                    placeholder="password"
                />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
              </div>

              <div class="d-flex justify-content-around my-4">
                <div>
                  <!-- Remember me -->
                  <div class="form-check  custom-checkbox">
                    <input
                      type="checkbox"
                      class="custom-control-input form-check-input" 
                      id="remember"
                      name="remember" 
                      {{ old('remember') ? 'checked' : '' }}
                    />
                    <label class="custom-control-label" for="remember"
                      >Remember me</label
                    >
                  </div>
                </div>

                @if (Route::has('password.request'))
                <span class="forgotPass">
                  <!-- Forgot password -->
                  <a href="{{ route('password.request') }}">Forgot password?</a>
                </span>
                @endif
              </div>

              <!-- Sign in button -->
              <button
                class="btn btn-outline-danger btn-rounded btn-block my-4"
                type="submit"
              >
                Sign in
              </button>

              <!-- Social login -->
              <p>or sign in with:</p>
              <a href="" class="btn-social btn-sm text-center">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="" class="btn-social btn-sm">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="" class="btn-social btn-sm">
                <i class="fab fa-linkedin-in"></i>
              </a>
              <a href="" class="btn-social btn-sm">
                <i class="fab fa-github"></i>
              </a>
            </form>
          </div>
          <div class="card-footer logincard-header text-center">
            <strong>© FoodHunter</strong>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('custom-scripts')
<script>
      var swiper = new Swiper(".loginswiper-container", {
        spaceBetween: 30,
        noSwiping: true,
        effect: "flip",
        autoplay: {
          delay: 3000,
          disableOnInteraction: false
        }
      });
    </script>
@endpush













<!-- <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->