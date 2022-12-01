<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('img/delgont-favicon.png') }}" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Delgont | @yield('title', 'Delgont')</title>

        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link href="{{ asset('css/delgont.css') }}" rel="stylesheet">

        @yield('requiredCss')

        @php
            $customCss = config('cmsui.css', [])
        @endphp
        @if (count($customCss))
            @for ($i = 0; $i < count($customCss); $i++)
                <link href="{{ asset($customCss[$i]) }}" rel="stylesheet">
            @endfor
        @endif

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/vue@3.2.45/dist/vue.global.min.js" defer></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>
        <script src="{{ asset('js/delgont.js') }}" defer></script>
    </head>
    <body class="custom-scrollbar page-top">
        <div class="" id="wrapper">

            <!-- Sidebar Wrapper-->
            <div id="sideBarWrapper" class="sidebar-wrapper sidebar-toggled">
                @includeIf('delgont::include.sidebar')
            </div>
            <!-- //Sidebar Wrapper -->

            <!-- Page Content -->
            <div id="content-wrapper" class=" content-wrapper d-flex flex-column body-bg-color">
                <div class="content" id="content">
                    
                    <!-- navbar =-->
                    @include('delgont::include.navbar')
                    <!-- //navbar -->

                    <!-- Page Heading -->
                      <div class="container-fluid mt-4">
                          <div class="row">
                              <div class="col-12 col-lg-3"><h1 class="h1 page-heading">@yield('pageHeading')</h1></div>
                              <div class="col-lg-6 text-right">@yield('actions')</div>
                              <div class="col-lg-3 text-center actions-right">
                                @yield('actions-right')
                              </div>
                          </div>
                      </div>

                    <!-- Begin Page Content -->
                    @yield('content')
                    
                </div>

                 <!-- Footer -->
                <footer class="sticky-footer">
                    <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2019</span>
                    </div>
                    </div>
                </footer>
                <!-- End of Footer -->
               
                
            </div>
           
        </div>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="bx bx-angle-up"></i>
        </a>
        <div id="snackbar">Some text some message..</div>

        @yield('requiredJs')
    </body>

</html>


