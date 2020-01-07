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
                  <p class="profile-name">Username Here</p>
                  <p class="designation">seller/admin</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Menu</li>
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
                    <a class="nav-link" href="#">Categories</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="#">Create Category</a>
                  </li>
                  
                </ul>
              </div>
            </li>
           
          </ul>
</nav>