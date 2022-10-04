@if( isset($userInfo['displayName']) && !empty($userInfo['displayName']) ) 
<header id="header" class="header fixed-top d-flex align-items-center">   
      <!-- ======= Header ======= -->
      <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
          <img src="{{asset('assets/img/icon.png')}}" alt="" 
            style="
            max-height: 50px;
            margin-right: 6px;
          ">
          <h1 style="font-size: 30px;
          font-weight: 700;
          color: #012970;
          font-family: Nunito, sans-serif;">
          FindNoy</h1>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->

        <!-- <div class="search-bar">
          <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
          </form>
        </div> -->
        <!-- End Search Bar -->

        <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">

            <!-- <li class="nav-item d-block d-lg-none">
              <a class="nav-link nav-icon search-bar-toggle " href="#">
                <i class="bi bi-search"></i>
              </a>
            </li> -->
            <!-- End Search Icon-->

            <li class="nav-item dropdown">

              <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-bell"></i>
                <span class="badge bg-primary badge-number">4</span>
              </a><!-- End Notification Icon -->

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                <li class="dropdown-header">
                  You have 4 new notifications
                  @if( isset($userInfo['role']) && !empty($userInfo['role'] == "police_station_admin"))
                  <a href="{{url('showall')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                  @endif
                  <!-- Super admin -->
                  @if(isset($userInfo['role']) && !empty($userInfo['role'] == "super_admin"))
                  <a href="{{url('showall_super_admin')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                  @endif

                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li class="notification-item" id="tableId">
                  <i class="bi bi-info-circle text-primary"></i>
                  <div>
                    <h4>Dicta reprehenderit</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>4 hrs. ago</p>
                  </div>
                </li>

                <li>
                  <hr class="dropdown-divider">
                </li>
                <li class="dropdown-footer">
                  @if(isset($userInfo['role']) && !empty(@$serInfo['role'] == "police_station_admin"))
                  <a href="{{url('showall')}}">Show all notifications</a>

                  @endif

                  <!-- Super admin -->
                  @if(isset($userInfo['role']) && !empty($userInfo['role'] == "super_admin"))
                  <a href="{{url('showall_super_admin')}}">Show all notifications</a>

                  @endif
                </li>

              </ul><!-- End Notification Dropdown Items -->
            </li><!-- End Notification Nav -->
           <!-- End Messages  -->
            <!-- <li class="nav-item dropdown">
              <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-chat-left-text"></i>
                <span class="badge bg-success badge-number">3</span>
              </a>

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                <li class="dropdown-header">
                  You have 3 new messages
                  <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                  <a href="#">
                    <img src="{{asset('assets/img/messages-1.jpg')}}" alt="" class="rounded-circle">
                    <div>
                      <h4>Maria Hudson</h4>
                      <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                      <p>4 hrs. ago</p>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li class="dropdown-footer">
                  <a href="#">Show all messages</a>
                </li>

              </ul>
            </li> -->
            <!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">
              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <span class="d-none d-md-block dropdown-toggle ps-2">{{ !empty($userInfo['displayName']) ? $userInfo['displayName'] : "" }}</span>
              </a>
              <!-- End Profile Iamge Icon -->

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                  <h6>{{ !empty($userInfo['displayName']) ? $userInfo['displayName']." FindNoy" : "" }}</h6> 
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                @if( isset($userInfo['role']) && !empty($userInfo['role'] == "police_station_admin")) 
                  <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{url('users_profile')}}">
                      <i class="bi bi-person"></i>
                      <span>My Profile</span>
                    </a>
                  </li>
                  <li>
                  <hr class="dropdown-divider">
                </li>
                @endif
                <!-- <li>
                  <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                    <i class="bi bi-gear"></i>
                    <span>Account Settings</span>
                  </a>
                </li> -->
                <li>
                  <hr class="dropdown-divider">
                </li>
                
                <li>
                  
                  <a class="dropdown-item d-flex align-items-center" href="{{url('logout')}}">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign Out</span>
                  </a>
                </li>

              </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
          </ul>
        </nav>
        <!-- End Icons Navigation -->
</header>
    <!-- End Header -->
@endif

  