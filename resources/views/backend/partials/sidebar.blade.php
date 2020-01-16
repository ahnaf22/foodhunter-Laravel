@php
    use Illuminate\Support\Facades\Auth;

    $user= Auth::user();

@endphp


<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <!-- profile -->
            <li class="nav-item nav-profile">
              <a href="{{route('user.profile')}}" class="nav-link">
                <!-- image for the user -->
                <div class="profile-image">
                  <img class="img-md rounded-circle" src="{{asset('backend/assets/images/defaultImages/defaultUser.png')}}" >
                  <!-- <div class="dot-indicator bg-white"></div> -->
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{$user->first_name ." ". $user->last_name}}</p>
                  @if($user->is_admin)
                      <p class="designation">Admin of Foodhunter</p>
                  @elseif($user->is_seller)
                       <p class="designation">Seller account</p>
                  @elseif($user->is_offerer)
                       <p class="designation">Offerer account</p>
                  @else 
                       <p class="designation">User account</p>
                  @endif
                </div>
              </a>
            </li>

            <li class="nav-item nav-category">Menu</li>

            <!-- common link -->
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.profile')}}" >
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Profile</span>
                <i class="menu-arrow"></i>
              </a>
            </li>
           
            <!-- Admin Links -->
            @if($user->is_admin)
            <li class="nav-item">
              <!-- manage users  as admin-->
              <a class="nav-link" data-toggle="collapse" href="#ui-users" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage users</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-users">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.users.index')}}">All Users</a>
                  </li>
                  
                </ul>
              </div>
            </li>

            <!-- manage sellers -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-sellers" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage sellers</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-sellers">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.sellers.index')}}">All Sellers</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.sellers.requests')}}">Seller Requests</a>
                  </li>       
                </ul>
              </div>

            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-category" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Categories</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-category">
                <ul class="nav flex-column sub-menu">
                  
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.categories')}}">All Categories</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.category.create')}}">Create Category</a>
                  </li>
                  
                </ul>
              </div>
            </li>
          
            <!-- end of admin links -->
            
            <!-- seller Links -->
             @elseif($user->is_seller)
             <!-- SHOP management -->
             <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-shop" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage shop</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-shop">
                <ul class="nav flex-column sub-menu">
                  
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.shop.profile')}}">Profile</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.shop.orders')}}">orders</a>
                  </li>
                  
                </ul>
              </div>
            </li>



             <!-- add foods -->
             <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-foods" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Foods</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-foods">
                <ul class="nav flex-column sub-menu">
                  
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.food')}}">All foods</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.food.create')}}">Add food</a>
                  </li>
                  
                </ul>
              </div>
            </li>










            <!-- end of seller links -->

            <!-- offerer links -->
            @elseif($user->is_offerer)
            
            <!-- end of offerer links -->


            <!-- User Links -->
          
            
            <!-- end of user links -->
            @endif

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-userorders" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">You Ordered</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-userorders">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('user.orders')}}">Your orders</a>
                  </li>   
                </ul>
              </div>
            </li>
           
        </ul>
</nav>