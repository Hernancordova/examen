@extends('frontend.layouts.app')

@section('content')
<div data-stellar-background-ratio="0.5" class="parallax-section chr_banner chr-sub-banner text-center">
    <div class="container">
        <h5>Inicio de sesión</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicios</a></li>
            <li class="breadcrumb-item active">Inicio de sesión</li>
        </ol>
    </div>
</div>
<!--Banner Wrap End-->
<div class="main-contant">
    <!--Blog Section Start-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <!--Login Form Start-->
                    <form class="chr-login">
                        <!--Heading 1 Start-->
                        <div class="headind-1">
                            <h3 class="title">Inicio de sesión</h3>
                        </div>
                        <!--Heading 1 End-->
                        <div class="input-field">
                            <label>Nombre de Usuario</label>
                            <input type="text" placeholder="Nombre de usuario">
                        </div>
                        <div class="input-field">
                            <label>Contraseña</label>
                            <input type="password" placeholder="********" maxlength="8">
                        </div>
                        <div class="input-field">
                            <input type="submit" value="Pulsa Enter">
                        </div>
                        <a class="readmore-btn" href="#">¿Ha olvidado su contraseña?</a>
                    </form>
                    <!--Login Form End-->
                </div>
            </div>
        </div>
    </section>
    <!--Blog Section End-->
</div>
@endsection
