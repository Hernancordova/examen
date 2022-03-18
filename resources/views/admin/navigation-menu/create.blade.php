@extends('admin.layouts.app')

@section('title')
  Nuevo slider
@endsection

@section('sub-title')
  Home
@endsection

@section('content')
  <div class="page-content-wrapper">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
          <div class="card-title">
            <h6 class="text-primary">
              <i class="fas fa-images"></i> Agregar menú de navegación
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


            <form action="{{ route('admin.menu.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data" novalidate>
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Nombre
                  <span class="span-reqrired">*</span>
                </label>
                <input id="name" name="name" id="name" type="text" class="form-control" value="{{ old('name') }}"  placeholder="Complete este campo..." autofocus>
              </div>
              <div class="mb-3">
                <label for="icon" class="form-label">Icono
                  <span class="span-reqrired">*</span>
                </label>
                <input id="icon" name="icon" id="icon" type="text" class="form-control" value="{{ old('icon') }}"  placeholder="Complete este campo..." autofocus>
              </div>
              <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input id="link" name="link" type="url" class="form-control" value="{{ old('link') }}" placeholder="Complete este campo...">
              </div>
              <a href="{{ route('admin.menu.index') }}" class="btn btn-danger">Cancelar</a>
              <button type="submit" class="btn btn-primary">Guardar <i class="far fa-paper-plane"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
