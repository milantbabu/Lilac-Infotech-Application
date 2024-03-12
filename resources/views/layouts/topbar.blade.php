<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

        <!-- Sidebar Toggler (Topbar) -->
        <div class="text-center d-md-inline sidebar-open-icon">
            <!-- <button class="rounded-circle border-0" id="sidebarToggle"></button> -->
            <button class="navbar-toggler sidebar-toggler"  id="sidebarToggle" type="button" data-toggle="minimize">
                <span class="ti-layout-grid2"></span>
           </button>
        </div>

        <!-- Sidebar Toggler (Topbar-Desktop) -->

        <!-- Sidebar Toggle (Topbar) -->
        <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button> -->
        <!-- Sidebar Toggler (Topbar-Mobile) -->

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto top-right-section">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <!-- <li class="nav-item dropdown no-arrow ">
              <div class="lookup lookup-circle lookup-right">
                {{-- <form id="menu_search"> --}}
                  <input type="text" name="menu">
                {{-- </form> --}}
               </div>
          </li> -->

          <!-- Nav Item - Alerts -->
          <!-- <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
              <!-- <span class="badge badge-danger badge-counter notification-counter">
                {{-- Counter here --}}
              </span>
            </a> -->
            <!-- Dropdown - Alerts -->
            <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
                Alerts Center
                <a href="javascript:void(0);" id="mark-all-icon" class="read-all-notification float-right" data-toggle="tooltip" title="Mark all as Read">
                  <i class="text-white fas fa-check-double"></i>
                </a>
              </h6>
              <span id="notification-lists">
                {{-- Notification goes here --}}
              </span>
              <a class="dropdown-item text-center small text-gray-500" href="">Show All Alerts</a>
            </div> -->
          <!-- </li> --> -->

          <!-- Nav Item - Messages -->
          <!-- <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-envelope fa-fw"></i>
              <!-- Counter - Messages -->
              <!-- <span class="badge badge-danger badge-counter">7</span>
            </a> -->
            <!-- Dropdown - Messages -->
            <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">
                Message Center
              </h6>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="" alt="">
                  <div class="status-indicator bg-success"></div>
                </div>
                <div class="font-weight-bold">
                  <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                  <div class="small text-gray-500">Emily Fowler · 58m</div>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="" alt="">
                  <div class="status-indicator"></div>
                </div>
                <div>
                  <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                  <div class="small text-gray-500">Jae Chun · 1d</div>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="" alt="">
                  <div class="status-indicator bg-warning"></div>
                </div>
                <div>
                  <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                  <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="" alt="">
                  <div class="status-indicator bg-success"></div>
                </div>
                <div>
                  <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                  <div class="small text-gray-500">Chicken the Dog · 2w</div>
                </div>
              </a>
              <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div>
          </li> --> -->

          <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="JavaScript:Void(0);" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-white small">{{session('user_first_name')}} {{session('user_last_name')}}</span>
              <img class="img-profile rounded-circle"
              src="{{asset('assets/img/default-profile-pic.jpg')}}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="{{ route('userProfile') }}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="JavaScript:Void(0);" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>

      </nav>
      <!-- End of Topbar -->
