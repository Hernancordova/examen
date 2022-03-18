@extends('admin.layouts.app')

@section('title')
Inicio
@endsection

@section('sub-title')
Inicio
@endsection


@section('content')
<div class="page-content-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h6 class="text-primary">
              <i class="fas fa-bars"></i> Menú de navegación
            </h6>
            <div>
              <a href="{{ route('admin.menu.create') }}" class="btn btn-primary float-end">Nuevo <i class="fas fa-plus"></i></a>
              {{-- <form  method="POST" action="{{route('admin.home-slider.ShowSectionSlider', ['slider' => $home->id] )}}" class="d-inline">
                @csrf
                <input type="hidden" name="state" value="{{$home->show_section_slider}}">
                @if ($home->show_section_slider)
                <button style="margin-right: 5px;"  type="submit" class="btn btn btn-danger float-end" title="">
                  Ocultar Slider <i class="fas fa-eye-slash"></i>
                </button>
                @else
                <button style="margin-right: 5px;" type="submit" class="btn btn btn-success " title="Cambiar estado">
                  Mostrar Slider <i class="fas fa-eye"></i>
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

          <div class="table-responsive">
            <table class="table table-sm table-striped mt-4">
              <thead>
                  <tr>
                    <th style="width: 120px;" scope="col">Opciones</th>
                    <th style="width: 90px;" scope="col">Estado</th>
                    <th style="min-inline-size: 120px;">Nombre</th>
                    <th style="min-inline-size: 120px;">Icono</th>
                    <th scope="col">Link</th>
                  </tr>
              </thead>
              <tbody class="vertical-align-middle">
                @foreach ($menus as $menu)
                  <tr>
                    <td style=" text-align: left;vertical-align: middle;">
                      <a href="{{ route('admin.menu.edit', ['menu' => $menu->id] ) }}" class="btn btn-sm btn-info" title="Editar"><i class="far fa-edit"></i></a>
                      <form action="{{ route('admin.menu.destroy',$menu->id) }}"  method="POST" class="d-inline form-delete">
                          @csrf
                          @method('DELETE')
                          <button type="submit" title="Eliminar" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                      </form>

                      <form method="POST" action="{{route('admin.menu.updateIsActive', ['menu' => $menu->id] )}}" class="d-inline">
                        @csrf
                        <input type="hidden" name="state" value="{{$menu->is_active}}">
                        @if ($menu->is_active)
                          <button type="submit"
                            class="btn btn-sm btn-success"
                            title="Cambiar estado">
                            <i class="far fa-check-circle"></i>
                          </button>
                        @else
                          <button type="submit"
                            class="btn btn-sm btn-danger"
                            title="Cambiar estado">
                            <i class="far fa-times-circle"></i>
                          </button>
                        @endif
                      </form>

                      <td style="vertical-align: middle;">
                          @if ($menu->is_active)
                          <span style="width: 60px;" class="badge rounded-pill bg-success">{{$menu->is_active ? 'Activo' : 'Inactivo'}}
                          @else
                          <span style="width: 60px;" class="badge rounded-pill bg-danger">{{$menu->is_active ? 'Activo' : 'Inactivo'}}
                          @endif</span>
                      </td>

                      <td>{{$menu->name}}</td>
                      <td>{{$menu->icon}}</td>
                      <td>{{$menu->link}}</td>
                     </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')

  @if (session('deleted') == 'Eliminado')
    <script>
      Swal.fire({
            icon: 'success',
            title: 'Eliminado!',

            html: `
            Se ha eliminado con exito
            `,
            confirmButtonText: 'Aceptar'
          })
    </script>
  @endif

  <script>
    $('.form-delete').submit(function(e){
      e.preventDefault()

      Swal.fire({
      title: '¿Estas seguro?',
      text: "Se eliminará definitivamente!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Eliminar!',
      cancelButtonText: 'Cancelar'

      }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
      })
    })
  </script>
@endsection

