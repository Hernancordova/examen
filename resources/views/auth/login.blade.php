@extends('layouts.app')

@section('content')

<body data-topbar="colored">
  <head>

    <meta charset="utf-8" />
    <title>Editable Table | Agroxa - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <meta name="END-POINT" content="http://netflix01.test:8080/">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/general-styles.css') }}">
    @yield('styles')
  </head>


      <div class="account-pages"></div>
      <div class="wrapper-page">

          <div class="card">
              <div class="card-body">

                  <div class="auth-logo">
                      <h3 class="text-center">
                          <a href="index.html" class="logo d-block my-4">
                              <img src="{{asset('admin/assets/images/logo-light-netflix.png')}}" class="logo-dark mx-auto" height="60" alt="logo-dark">
                          </a>
                      </h3>
                  </div>

                  <div class="p-3">
                      <h4 class="text-muted font-size-18 text-center">Bienvenido</h4>
                      <p class="text-muted text-center">Ingrese sus credenciales.</p>

                      <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        @csrf
                          <div class="mb-3">
                              <label class="form-label" for="username">Correo electrónico</label>
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Introduzca su correo correo electrónico" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>

                          <div class="mb-3">
                              <label class="form-label" for="userpassword">Contraseña</label>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Introduzca su  contraseña" required autocomplete="current-password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>

                          <div class="mb-3 row">
                              <div class="col-6">
                                  <div class="form-check">
                                      <input type="checkbox" class="form-check-input" id="customControlInline">
                                      <label class="form-check-label" for="customControlInline">Recuérdame</label>
                                  </div>
                              </div>
                              <div class="col-6 text-end">
                                  <button class="btn btn-primary w-md waves-effect waves-light" type="submit">{{ __('Acceder') }}</button>
                              </div>
                          </div>

                          {{-- <div class="mb-3 row">
                              <div class="col-12">
                                  <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your
                                      password?</a>
                              </div>
                          </div> --}}
                      </form>
                  </div>

              </div>
          </div>
      </div>
@endsection
