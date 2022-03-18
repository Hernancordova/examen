<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <title>@yield('title') | Netflix</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <meta name="END-POINT" content="{{ config('app.end_point') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/general-styles.css') }}">
    @yield('styles')
  </head>

    <body data-topbar="colored">
        <div id="layout-wrapper">
          <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">

                    <div class="navbar-brand-box">
                        <a href="{{route('dashboard.index')}}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{asset('admin/assets/images/logo-sm-dark.png')}}" alt="" height="32">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('admin/assets/images/logo-light-netflix.png')}}" alt="" height="55">
                            </span>
                        </a>

                        <a href="{{route('dashboard.index')}}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{asset('admin/assets/images/logo-sm-light.png')}}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('admin/assets/images/logo-light-netflix.png')}}" alt="" height="55">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{asset('admin/assets/images/users/user.png')}}"
                                alt="Header Avatar">
                        </button>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{-- route('profile') --}}"><i
                                    class="mdi mdi-account-circle font-size-16 align-middle me-2 text-muted"></i>
                                <span>Mi cuenta</span></a>


                            <div class="dropdown-divider"></div>

                              <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <i class="mdi mdi-power font-size-16 align-middle me-2 text-primary"></i>
                                <span class="font-size-14 align-middle me-2 text-primary">{{ __('Cerrar sesión') }}</span>
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                              </a>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="mdi mdi-cog bx-spin"></i>
                        </button>
                    </div>

                </div>
            </div>
          </header>

            <div class="vertical-menu">

                <div data-simplebar class="h-100">
                    {{-- <div class="user-details">
                        <div class="d-flex">
                            <div class="me-2">
                                <img src="{{asset('backend/assets/images/users/avatar-4.jpg')}}" alt="" class="avatar-md rounded-circle">
                            </div>
                            <div class="user-info w-100">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Donald Johnson
                                        <i class="mdi mdi-chevron-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-account-circle text-muted me-2"></i>
                                                Profile<div class="ripple-wrapper me-2"></div>
                                            </a></li>
                                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-cog text-muted me-2"></i>
                                                Settings</a></li>
                                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-lock-open-outline text-muted me-2"></i>
                                                Lock screen</a></li>
                                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-power text-muted me-2"></i>
                                                Logout</a></li>
                                    </ul>
                                </div>

                                <p class="text-white-50 m-0">Administrator</p>
                            </div>
                        </div>
                    </div> --}}

                    @include('admin.layouts.menu-sidebar')
                </div>
            </div>
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> @yield('sub-title') </h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Netflix</a></li>
                                            <li class="breadcrumb-item active"> @yield('sub-title') </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                Netflix © Copyright <script>document.write(new Date().getFullYear())</script>
                            </div>

                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-end">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Configuración</h5>
                </div>

                <hr class="" />
                <h6 class="text-center mb-0">Elija su tema</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <label for="light-mode-switch" class="cursor-pointer user-select-none">
                            <img src="{{asset('admin/assets/images/layouts/layout-1.png')}}" class="img-fluid img-thumbnail image-scale" alt="">
                        </label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input type="radio" class="form-check-input theme-choice cursor-pointer" id="light-mode-switch" checked />
                        <label class="form-check-label cursor-pointer user-select-none" for="light-mode-switch">Modo claro</label>
                    </div>

                    <div class="mb-2">
                        <label for="dark-mode-switch" class="cursor-pointer user-select-none">
                            <img src="{{asset('admin/assets/images/layouts/layout-2.png')}}" class="img-fluid img-thumbnail image-scale" alt="">
                        </label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input type="radio" class="form-check-input theme-choice cursor-pointer" id="dark-mode-switch"
                            data-bsStyle="{{asset('backend/assets/css/bootstrap-dark.min.css')}}" data-appStyle="{{asset('backend/assets/css/app-dark.min.css')}}" />
                        <label class="form-check-label cursor-pointer user-select-none" for="dark-mode-switch">Modo oscuro</label>
                    </div>

                </div>

            </div>
        </div>

        <div class="rightbar-overlay"></div>

        <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/app.js')}}"></script>
        <script src="{{ asset('client/js/sweetalert2.js') }}"></script>


        @yield('scripts')

    </body>
</html>
