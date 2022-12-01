<!-- Sidebar -->
<ul class="navbar-nav sidebar accordion toggledd" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
      <div class="sidebar-brand sidebar-brand-img d-none">
        <img src="{{ asset('img/delgont.jpg') }}" alt="delgont logo" class="brand-img" />
      </div>
      <div class="sidebar-brand sidebar-brand-text">
        <h1>Delgont</h1>
      </div>
    </a>
  
    <!-- Divider -->
    <hr class="sidebar-divider">
  
    <!-- Nav Item - Dashboard -->
    <li class="nav-item sidebar-nav-item">
      <a class="nav-link sidebar-nav-link" href="{{ route('delgont.dashboard') }}">
        <i class="bx bx-home-circle bx-sm sidebar-icon"></i>
        <span>Dashboard</span>
      </a>
    </li>

  
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item sidebar-nav-item d-none">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pages" aria-expanded="true" aria-controls="pages">
        <i class='bx bxl-html5 bx-sm sidebar-icon'></i>
        <span>Pages</span>
      </a>
      <div id="pages" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="py-2 collapse-inner rounded">
          <a href="{{route('delgont.pages')}}" class="collapse-item ml-lg-4">{{ __('All Pages') }}</a>
          <a class="collapse-item ml-lg-4" href="{{ route('delgont.pages.create') }}">{{ __('Create Page') }}</a>
        </div>
      </div>
    </li>

    <li class="nav-item sidebar-nav-item ">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#posts" aria-expanded="true" aria-controls="posts">
        <i class='bx bxs-box bx-sm sidebar-icon'></i>
        <span>Posts</span>
      </a>
      <div id="posts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item ml-lg-4" href="{{route('delgont.posts')}}" >{{ __('All Posts') }}</a>
          <a class="collapse-item ml-lg-4" href="{{route('delgont.posts.create')}}">{{ __('Create Post') }}</a>
          <a class="collapse-item ml-lg-4" href="{{route('delgont.posts.posttypes')}}">{{ __('Post Types') }}</a>
          <a class="collapse-item ml-lg-4" href="{{route('delgont.posts.categories')}}">{{ __('Post Categories') }}</a>
        </div>
      </div>
    </li>

    <li class="nav-item sidebar-nav-item ">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#front" aria-expanded="true" aria-controls="front">
        <i class='bx bxs-layout bx-sm sidebar-icon'></i>
        <span>Front</span>
      </a>
      <div id="front" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item ml-lg-4 text-capitalize" href="{{route('delgont.templates')}}">{{ __('templates') }}</a>
          <a class="collapse-item ml-lg-4 text-capitalize" href="{{route('delgont.templates.sections')}}">{{ __('sections') }}</a>
          <a class="collapse-item ml-lg-4 text-capitalize" href="{{route('delgont.templates.sections')}}">{{ __('widgets') }}</a>
        </div>
      </div>
    </li>

    <!-- Categories -->
    <li class="nav-item sidebar-nav-item">
      <a class="nav-link" href="{{route('delgont.menus')}}">
        <i class='bx bx-tag sidebar-icon'></i>
        <span>Menus</span></a>
    </li>

    <!-- Files | Media -->
    <li class="nav-item sidebar-nav-item">
      <a class="nav-link" href="{{route('delgont.files')}}">
        <i class='bx bx-file sidebar-icon'></i>
        <span>Files | Media</span></a>
    </li>

    <!-- Categories -->
    <li class="nav-item sidebar-nav-item">
      <a class="nav-link" href="{{route('delgont.categories')}}">
        <i class='bx bx-tag sidebar-icon'></i>
        <span>Categories</span></a>
    </li>


    <hr class="sidebar-divider">


<!-- Sidebar Extension -->

@includeIf('dashboard.sidebar.navitems')

@php
    $extensions = config('web.sidebar_extension', [])
@endphp

@if (count($extensions))
    @for ($i = 0; $i < count($extensions); $i++)
        @includeIf($extensions[$i])
    @endfor
@endif

<hr class="sidebar-divider">


  <!-- Users Nav Item - Pages Collapse Menu -->
  <li class="nav-item sidebar-nav-item ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
      <i class='bx bx-group bx-sm sidebar-icon'></i>
      <span>Users</span>
    </a>
    <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item ml-lg-4" href="{{route('delgont.users')}}" >{{ __('All Users') }}</a>
        <a class="collapse-item ml-lg-4" href="{{route('delgont.users.admins')}}">{{ __('Admins') }}</a>
      </div>
    </div>
  </li>

    <!-- Settings -->
    <li class="nav-item sidebar-nav-item">
      <a class="nav-link sidebar-nav-link dev" href="{{ route('delgont.settings.general') }}" data-toggle="collapsedev" data-target="#collapseSettings" aria-expanded="true" aria-controls="collapseUsers">
        <i class='bx bx-cog sidebar-icon bx-sm'></i>
        <span>Settings</span>
      </a>
      <div id="collapseSettings" class="collapse sidebar-collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('delgont.settings.general') }}">System Settings <i class="fa fa-mars float-right" style="font-size: 0.89rem;"></i></a>
          <a class="collapse-item d-none" href="">CMS Settings</a>
        </div>
      </div>
    </li>
  
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center mt-5 sidebar-toggle-wrapper">
      <button class="rounded-circle border-0 sidebar-toggle" id="sidebarToggle"><i class='bx bx-collapse-horizontal'></i></button>
    </div>
  
  </ul>