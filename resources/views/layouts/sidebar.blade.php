
@if( isset($userInfo['email']) && !empty($userInfo['email']) ) 
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
          @if( isset($userInfo['role']) && !empty($userInfo['role'] == "super_admin")) 
            <a class="nav-link collapsed" href="{{url('home_superadmin')}}">
              <i class="bi bi-grid"></i>
              <span>Dashboard</span>
            </a>
          @endif
          @if( isset($userInfo['role']) && !empty($userInfo['role'] == "police_station_admin")) 
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img style="width:50px;height:50px"
            src="{{!empty($userInfo['police_pic_profile']) ? $userInfo['police_pic_profile'] : asset('assets/img/profile-img.jpg')}}"
            alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block  ps-2"> 
              <p><h4> {{ isset($userInfo['police_user_rank'])? $userInfo['police_user_rank'] : "" }}   {{ isset($userInfo['police_user_lname'])? $userInfo['police_user_lname'] : "" }} </h4> </p>
              <p> {{ isset($userInfo['station_num'])? $userInfo['station_num'] : "" }}  - REG7 </p>
            </span>
           
          </a>
          <a class="nav-link collapsed" href="{{url('dashboard_police_station')}}">
              <i class="bi bi-grid"></i>
              <span>Dashboard</span>
            </a>
          @endif
      </li>
      <!-- End Dashboard Nav -->

      @if( isset($userInfo['role']) && !empty($userInfo['role'] == "super_admin")) 
        <!-- Police Station  Nav -->
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"  href="#">
                <i class="bi bi-menu-button-wide"></i><span>Police Station</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                  <a href="{{url('add_police_station')}}" id="add_station">
                    <i class="bi bi-circle"></i><span>ADD</span>
                  </a>
                </li>
                 <li>
                  <a href="{{url('list_police_station')}}" id="list_station">
                    <i class="bi bi-circle"></i><span>LIST</span>
                  </a>
                </li>
                
                 <li>
                  <a href="{{url('inactive_police_station')}}" id="inactive_police_station">
                    <i class="bi bi-circle"></i><span>INACTIVE</span>
                  </a>
                </li>
            </ul>
          </li>
          @endif
        <!-- End Police Station  Nav -->
        @if( isset($userInfo['role']) && !empty($userInfo['role'] == "police_station_admin")) 
          <!-- Police Station  Nav -->
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-journal-text"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{url('add_field_officers')}}" id="add_field_officers">
                  <i class="bi bi-circle"></i><span>Add Field Officers</span>
                </a>
              </li>
              <li>
                <a href="{{url('list_field_officers')}}" id="list_field_officers">
                  <i class="bi bi-circle"></i><span>List Field Officers</span>
                </a>
              </li>
              <li>
                <a href="{{url('list_inactive_field_officers')}}" id="list_inactive_field_officers">
                  <i class="bi bi-circle"></i><span>List Inactive Field Officers</span>
                </a>
              </li>
              <li>
                <a href="{{url('list_of_civilians')}}" id="list_of_civilians">
                  <i class="bi bi-circle"></i><span> List Civilian Users</span>
                </a>
              </li>

            </ul>
          </li>
          <!-- End Forms Nav -->
          <!-- Case  Nav -->
          <li class="nav-item">
            <a href="{{url('dashboardcase')}}" id="dashboardcase" class="nav-link collapsed" >
              <i class="bi bi-journal-text"></i><span>Cases</span><i class="bi bi-chevron-down ms-auto"></i>     
            </a>
            <ul id="case-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{url('wanted_criminals')}}" id="wanted_criminals">
                  <i class="bi bi-circle"></i><span> Add Wanted Criminals</span>
                </a>
              </li>
              <li>
                <a href="{{url('missing_person')}}" id="missing_person">
                  <i class="bi bi-circle"></i><span> Add Missing Person</span>
                </a>
              </li>

              <li>
                <a href="{{url('carnapped')}}" id="carnapped">
                  <i class="bi bi-circle"></i><span>Add Carnapped</span>
                </a>
              </li>
              <!-- List Cases -->
              <li>
                <a href="{{url('list_wanted_criminal')}}" id="list_wanted_criminal">
                  <i class="bi bi-circle"></i><span> List  Wanted Criminals</span>
                </a>
              </li>
              <li>
                <a href="{{url('list_missing_person')}}" id="list_missing_person">
                  <i class="bi bi-circle"></i><span> List  Missing Person</span>
                </a>
              </li>
              <li>
                <a href="{{url('list_carnapped')}}" id="list_carnapped">
                  <i class="bi bi-circle"></i><span> List Carnapped</span>
                </a>
              </li>

            </ul>
          </li>
          <!-- End Forms Nav -->

          <!-- Solved  Nav -->
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#solved-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-journal-text"></i><span>Solved Cases</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="solved-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{url('missing')}}" id="missing">
                  <i class="bi bi-circle"></i><span>Missing Person List</span>
                </a> 
              </li>
              <li>
                <a href="{{url('criminal')}}" id="criminal">
                  <i class="bi bi-circle"></i><span>Wanted Criminal List</span>
                </a>
              </li>

              <li>
                <a href="{{url('vehicle')}}" id="vehicle">
                  <i class="bi bi-circle"></i><span>Carnapped Vehicle List</span>
                </a>
              </li>

            </ul>
          </li>
          <!-- End Forms Nav -->

          @endif
      <!-- End Police Station  Nav -->
    </ul>
  </aside>
   <!-- End Sidebar-->

  @endif


