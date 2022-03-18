@extends('admin.layouts.app')

@section('title')
Nuevo Usuario
@endsection

@section('sub-title')
Usuarios
@endsection

@section('content')
<div class="page-content-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h6 class="text-primary">
              <i class="fas fa-user-plus"></i> Nuevo usuario
            </h6>
          </div>
          <hr>

          @if (count($errors->all()))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
              @foreach ($errors->all() as $message)
              <li>{{$message}}</li>
              @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <form action="{{ route('usuario.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nombres
                <span class="span-reqrired">*</span>
              </label>
              <input id="name" name="name" id="name" type="text" class="form-control" value="{{ old('name') }}" placeholder="Complete su nombre..." autofocus>
            </div>
            <div class="mb-3">
              <label for="last_name" class="form-label">Apellidos
                <span class="span-reqrired">*</span>
              </label>
              <input id="last_name" name="last_name" id="last_name" type="text" class="form-control" value="{{ old('last_name') }}" placeholder="Complete su nombre..." autofocus>
            </div>
            <div class="mb-3">
              <label for="nick_name" class="form-label">Apodo
                <span class="span-reqrired">*</span>
              </label>
              <input id="nick_name" name="nick_name" id="nick_name" type="text" class="form-control" value="{{ old('nick_name') }}" placeholder="Complete su nombre..." autofocus>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Teléfono</label>
              <input id="phone" name="phone" id="phone" type="text" class="form-control" value="{{ old('nro_card') }}" placeholder="Complete su nombre..." autofocus>
            </div>
            <div class="mb-3">
              <label for="nro_card" class="form-label">N° tarjeta</label>
              <input id="nro_card" name="nro_card" id="nro_card" type="text" class="form-control" value="{{ old('phone') }}" placeholder="Complete su nombre..." autofocus>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Correo electrónico</label>
              <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Complete su correo electrónico...">
            </div>

            <div class="mb-3">
              <label class="mb-0" for="">Avatar <small class="text-muted"> (Tamaño de imagen recomendado 220px x 290px) </small></label>
              <input type="file" accept="image/*" class="form-control" name="avatar" id="avatar">
            </div>
            <a href="{{ route('usuario.index') }}" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar <i class="far fa-paper-plane"></i></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
