@php
    use Illuminate\Support\Facades\Auth;

    $user= Auth::user();

@endphp


<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
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
                    <a class="nav-link" href="#">Online Users</a>
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
            @endif
            <!-- end of admin links -->
            
            <!-- seller Links -->
            <!-- end of seller links -->

            <!-- offerer links -->
            <!-- end of offerer links -->
           
        </ul>
</nav>