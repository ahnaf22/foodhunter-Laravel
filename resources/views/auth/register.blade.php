@extends('frontend.layouts.master')

@section('content')

  <div class="row registerWrapper m-0">
        <div class="col-lg-6 col-sm-6 col-xs-6 registerSidePanel ">
            <div class="regImageDIv d-flex  align-items-center justify-content-center ">
                <img src="{{asset('/frontend/assets/images/registerImages/register.jpg')}}" alt="regImage">
            </div>
        </div>

        <!-- Register Panel -->
        <div class="col-lg-6 col-sm-6 col-xs-6 registerPanel d-flex align-items-center justify-content-center">
        
            <div class="card registerCard">
            <h3 class="card-header text-center py-4">
                <strong>Get Registered!</strong>
            </h3>

            <!--Card content-->
            <div class="card-body">
                <!-- Form -->
                <form class="text-center" style="color: #757575;"  method="POST" action="{{ route('register') }}" >
                @csrf  
                   
                    <!-- first name -->
                    <div class="form-group row md-form p-0">
                            <label for="first_name" class="col-md-4 col-form-label text-md-center">First Name :</label>

                            <div class="col-md-8">
                                <input id="first_name" 
                                       type="text" 
                                       class="form-control @error('first_name') is-invalid @enderror" 
                                       name="first_name" 
                                       value="{{ old('first_name') }}" required 
                                       autocomplete="first_name" autofocus
                                       placeholder="first name here"
                                       >

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                    <!-- last name -->
                    <div class="form-group row md-form p-0">
                            <label for="phone" class="col-md-4 col-form-label text-md-center">Last Name :</label>

                            <div class="col-md-8">
                                <input id="last_name" 
                                       type="text" 
                                       class="form-control @error('last_name') is-invalid @enderror" 
                                       name="last_name" 
                                       value="{{ old('last_name') }}" required 
                                       autocomplete="last_name" autofocus
                                       placeholder="last name here"
                                       >

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                    <!-- email -->
                    <div class="form-group row md-form p-0">
                            <label for="email" class="col-md-4 col-form-label text-md-center">Email :</label>

                            <div class="col-md-8">
                                <input id="email" 
                                       type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" 
                                       value="{{ old('email') }}" required 
                                       autocomplete="email" autofocus
                                       placeholder="last name here"
                                       >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                    <!-- password -->
                    <div class="form-group md-form row p-0">
                            <label for="password" class="col-md-4 col-form-label text-md-center">Password:</label>

                            <div class="col-md-8">
                                <input id="password" 
                                       type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       name="password" required 
                                       autocomplete="new-password"
                                       placeholder="must be 8 characters"
                                       >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>                    
                     <!-- confirm Password -->
                    <div class="form-group md-form p-0 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-center">Confirm Password:</label>

                            <div class="col-md-8">
                                <input id="password-confirm" 
                                       type="password" 
                                       class="form-control" 
                                       name="password_confirmation" required 
                                       autocomplete="new-password"
                                       placeholder="type your password again"
                                       >
                            </div>
                    </div>
                    <!-- phone number -->
                    <div class="form-group row md-form p-0">
                            <label for="phone" class="col-md-4 col-form-label text-md-center">Phone Num :</label>

                            <div class="col-md-8">
                                <input id="phone" 
                                       type="text" 
                                       class="form-control @error('phone') is-invalid @enderror" 
                                       name="phone" 
                                       value="{{ old('phone') }}" required 
                                       autocomplete="phone" autofocus
                                       placeholder="must be a valid phone number"
                                       >

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                    <!-- address -->
                    <div class="form-group row md-form p-0">
                            <label for="address" class="col-md-4 col-form-label text-md-center">address:</label>

                            <div class="col-md-8">
                                <input id="address" 
                                       type="text" 
                                       class="form-control @error('address') is-invalid @enderror" 
                                       name="address" 
                                       value="{{ old('address') }}" required 
                                       autocomplete="address" autofocus
                                       placeholder="must be a valid address"
                                       >

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                    <!-- Register button -->
                    <button
                        class="btn btn-outline-danger btn-rounded btn-md my-4"
                        type="submit"
                    >
                        Register
                    </button>
                </form>
            </div>
            <div class="card-footer logincard-header text-center">
                <strong>© FoodHunter</strong>
            </div>
            </div>
        </div>   
  </div>

@endsection




<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->