<nav class="navbar navbar-expand static-top navbar-expand navbar-light topbar mb-1 shadow-sm">

  <!-- Sidebar Toggle (Positioned On Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class='bx bx-sm bxs-grid'></i>
  </button>

  <!-- Topbar Search -->
  @yield('search')
  
  <ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
      <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw"></i>
      </a>
      <!-- Dropdown - Messages -->
      <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <form class="form-inline mr-auto w-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="bx bx-search bx-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    
      
    <div class="divider nav-item-divider d-sm-block"></div>
  
    <!-- Nav Item - dashboard home -->
    <li class="nav-item">
        <a href="{{ route('delgont.dashboard') }}" class="nav-link"><i class="bx bx-sm bx-home-circle navbar-icon text-dark"></i></a>
    </li>
  
  
    <!-- Nav Item - Notifications -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="bx bx-bell  bx-sm navbar-icon text-primary"></i>
          <!-- Counter - Alerts -->
          <span class="badge badge-danger badge-counter notifications-counter" id="notificationsCounter" data-url="{{ route('delgont.account.notifications.count') }}"></span>
        </a>
        <!-- Dropdown - Notifications -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header">
            Notifications Center
          </h6>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
              <div class="rounded-circle">
                <i class="bx bx-bell bx-sm text-primary"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">December 12, 2019</div>
              <span class="font-weight-bold">A new monthly report is ready to download!</span>
            </div>
          </a>
          
          <a class="dropdown-item text-center small text-gray-500" href="{{ route('delgont.account.notifications') }}">Show All Notifications</a>
        </div>
    </li>
  
       

    <!-- Nav Item - Messages -->
    <li class="nav-item dropdown no-arrow mx-1 d-none">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="bx bx-sm bx-envelope navbar-icon"></i>
          <!-- Counter - Messages -->
          <span class="badge badge-danger badge-counter">7</span>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
          <h6 class="dropdown-header">
            Message Center
          </h6>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
              <img class="rounded-circle" src="{{ asset('img/default-avator.jpg') }}" alt="">
              <div class="status-indicator bg-success"></div>
            </div>
            <div class="font-weight-bold">
              <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
              <div class="small text-gray-500">Emily Fowler · 58m</div>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
              <img class="rounded-circle" src="{{ asset('img/default-avator.jpg') }}" alt="">
              <div class="status-indicator"></div>
            </div>
            <div>
              <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
              <div class="small text-gray-500">Jae Chun · 1d</div>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
              <img class="rounded-circle" src="{{ asset('img/default-avator.jpg') }}" alt="">
              <div class="status-indicator bg-warning"></div>
            </div>
            <div>
              <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
              <div class="small text-gray-500">Morgan Alvarez · 2d</div>
            </div>
          </a>
          <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
        </div>
      </li>
  
  
     
      <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-group bx-sm navbar-icon text-secondary"></i>
          </a>
          <!-- Dropdown - Admin Information -->
          <div class="dropdown-menu dropdown-menu-right shadow-sm animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="{{ route('delgont.users.create') }}">
                <i class="bx bx-user-plus mr-2 text-gray-400"></i>
                Add User
              </a>
              <a class="dropdown-item" href="{{ route('delgont.users') }}">
                <i class="bx bx-group mr-2 text-gray-400"></i>
                Users
              </a>
          </div>
      </li>
  
      <div class="divider d-sm-block"></div>

      <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle p-2" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline username text-dark">{{ str_limit(auth()->user()->name, 12) }}</span>
              <img class="navbar-img rounded-circle" src="{{ (auth()->user()->avator) ? asset(auth()->user()->avator->url) : asset('img/default-avator.jpg') }}"  style="width: 2rem; height: 2rem;"/>
          </a>
          <!-- Dropdown - Admin Information -->
          <div class="dropdown-menu dropdown-menu-right shadow-sm p-2" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="{{ route('delgont.account') }}">
                <i class="bx bx-user mr-2 text-gray-400"></i>
                Account
              </a>
              <a class="dropdown-item" href="">
                <i class="bx bx-cog mr-2 text-gray-400"></i>
                Settings
              </a>
              <a class="dropdown-item" href="{{ route('delgont.account.activitylog') }}">
                <i class="bx bx-menu mr-2  text-gray-400"></i>
                Activity Log
              </a>
              <div class="dropdown-divider"></div>
              <a href="" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                  <i class="bx bx-sign-out mr-2 text-gray-400"></i>
                   Logout
              </a>
              <form id="logoutForm" action="{{ route('delgont.logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>
  
  </ul>
  
</nav>