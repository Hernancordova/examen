@extends('admin.layouts.app')

@section('title')
Usuarios
@endsection

@section('styles')

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
          <div class="page-title ">
          <div class="card-title">
            <h6 class="text-primary">
              <i class="fas fa-users"></i> Usuarios
            </h6>

            <div>
              <a href="{{ route('usuario.create') }}" class="btn btn-primary float-end">Nuevo <i class="fas fa-plus"></i></a>
              {{-- <form  method="POST" action="{{route('staff.ShowSectionStaff', ['staff' => $about->id] )}}" class="d-inline">
                @csrf
                <input type="hidden" name="state" value="{{$about->seccion_staff_is_active}}">
                @if ($about->seccion_staff_is_active)
                <button style="margin-right: 5px;"  type="submit" class="btn btn btn-danger float-end" title="">
                  Ocultar personal <i class="fas fa-eye-slash"></i>
                </button>
                @else
                <button  style="margin-right: 5px;" type="submit" class="btn btn btn-success " title="Cambiar estado">
                  Mostrar personal <i class="fas fa-eye"></i>
                </button>
                @endif
              </form> --}}
          </div>
        </div>

          <hr>

            @if (session('created'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('created') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session('updated'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('updated') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session('deleted'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('deleted') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            {{-- <form class="row justify-content-end" action="{{ route('usuario.index') }}" method="GET" autocomplete="off">
            <div class="form-group col-12 col-md-6 col-lg-4">
              <label for="" class="mb-0">Buscar</label>
              <div  class="input-group mb-3">
               <select name="searchBy" id="search-by"  class="form-select form-select cursor-pointer" aria-label=".form-select-sm example">
                 <option value="name" {{ request('searchBy') == 'name' ? 'selected' : '' }}>Nombres</option>
                 <option value="email" {{ request('searchBy') == 'email' ? 'selected' : '' }}>Correo</option>
               </select>



                <input class="form-control " id="form-name" type="search" placeholder="Nombres..." {{ request('search') ? 'autofocus' : '' }} name="search" aria-label="Search" value="{{ request('search') }}" >

                <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
              </div>

            </div>
          </form> --}}


            <div class="table-responsive">
              <table class="table table-sm table-striped mt-4">
                <thead>
                  <tr>
                    <th style="width: 80px;" scope="col">Opciones</th>
                    <th style="width: 80px;" scope="col">Estado</th>
                    <th scope="col">Apodo</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Correo electrónico</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Avatar</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <td style=" text-align: left;vertical-align: middle;">
                      <a href="{{ route('usuario.edit', ['usuario' => $user->id] ) }}" class="btn btn-sm btn-info" title="Editar"><i class="far fa-edit"></i></a>

                      <form method="POST" action="{{route('usuario.updateIsActive', ['usuario' => $user->id] )}}" class="d-inline">
                        @csrf
                        <input type="hidden" name="state" value="{{$user->is_active}}">
                        @if ($user->is_active)
                        <button type="submit" class="btn btn-sm btn-success" title="Cambiar estado">
                          <i class="far fa-check-circle"></i>
                        </button>
                        @else
                        <button type="submit" class="btn btn-sm btn-danger" title="Cambiar estado">
                          <i class="far fa-times-circle"></i>
                        </button>
                        @endif
                      </form>
                    </td>
                    <td style="vertical-align: middle;">
                      @if ($user->is_active)
                      <span style="width: 60px;" class="badge rounded-pill bg-success">{{$user->is_active ? 'Activo' : 'Inactivo'}}
                        @else
                        <span style="width: 60px;" class="badge rounded-pill bg-danger">{{$user->is_active ? 'Activo' : 'Inactivo'}}
                          @endif</span>
                    </td>

                    <td style="vertical-align: middle;">{{$user->nick_name}}</td>
                    <td style="vertical-align: middle;">{{$user->name}}</td>
                    <td style="vertical-align: middle;">{{$user->last_name}}</td>
                    <td style="vertical-align: middle;">{{$user->email}}</td>
                    <td>{{$user->phone}}</td>

                    <td style="vertical-align: middle;">
                      @if ($user->avatar)
                        <img src="{{ asset('storage/users/'.$user->avatar) }}" class="rounded-circle" width="30" height="30">
                      @else
                        <img src="{{ asset('assets/users/avatar-default.png') }}" class="rounded-circle" width="30" height="30">
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          {{-- {{ $users->links() }} --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
