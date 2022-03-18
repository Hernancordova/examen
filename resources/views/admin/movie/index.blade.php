@extends('admin.layouts.app')

@section('sub-title')
  Galería
@endsection

@section('styles')
<style>
    .input-profile {
      border-left: none;
      border-top: none;
      border-right: none;
      border-width: 3px;
    }

    input[switch]+label,
    input[switch]:checked+label:before,
    input[switch]:checked+label:after {
      transform: scale(.9)
    }

    /* CODE SNIPPETS CSS */

    .file_container {
      width: 100%;
      height: 150px;
      position: relative;
      border-radius: 10px;
      border-radius: inherit;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 0;
      overflow: auto;
    }


    .file_input {
      width: 100%;
      height: 100%;
      position: absolute;
      opacity: 0;
      z-index: 1;
      cursor: pointer;
      border-radius: inherit;
    }

    .file_letter {
      font-size: 1.5rem;
    }

    .file_image {
      z-index: 0;
      height: 100%;
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      top: 0;
      margin: auto;
    }
    .texto-encima{
    position: absolute;
    top: 0px;
    left: 0px;
    height: 50px;
    width: 50px;
    border-radius: 5px 0px 50px 0px;
    background: #1b82ec;
    cursor: pointer;
    }
    .icon-change-image{
      margin-left: 12px;
      margin-top: 8px;
      width: 10px;
    }
    .fa-icon-camera {
    font-size: 1.5em;
}
</style>
@endsection

@section('content')
<div class="page-content-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h6 class="text-primary">
              <i class="fa fa-film"></i>
              Películas
            </h6>
            <div>
             <a href="{{ route('admin.movie.create') }}" class="btn btn-primary">Nuevo <i class="fas fa-plus"></i></a>
             {{-- <form  method="POST" action="{{route('admin.gallery.ShowSectionGallery', ['gallery' => $home->id] )}}" class="d-inline">
              @csrf
              <input type="hidden" name="state" value="{{$home->show_section_gallery}}">
              @if ($home->show_section_gallery)
              <button style="margin-left: 5px;"  type="submit" class="btn btn btn-danger float-end" title="">
                Ocultar <i class="fas fa-eye-slash"></i>
              </button>
              @else
              <button style="margin-right: 5px;" type="submit" class="btn btn btn-success " title="Cambiar estado">
                Mostrar<i class="fas fa-eye"></i>
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

            <div class="row">
              @foreach ($movies as $movie)
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                  <div class="card m-3 bg-light rounded">
                    <form action="{{ route('admin.movie.update', ['movie' => $movie->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data" novalidate>
                      @method('PUT')
                      @csrf
                      <div class="mb-0">
                        <div class="file_container">
                          <input  type="file" class="file_input input-changes" data-id-gallery="{{$movie->id}}" onchange="previewImage(event, {{$movie->id}})"  name="image" accept="image/*">
                          <img class="file_image  card-img-top rounded-top" id="image-preview-{{$movie->id}}"  src="{{ asset('storage/movie-image/'.$movie->image) }}" alt="oscarthemes">
                          <div class="texto-encima file_containe">
                            <div class="icon-change-image">
                              <i class="fas fa-camera text-white fa-icon-camera"></i>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="card-body pb-1">
                        <i class="fas fa-pencil-alt"></i>
                        <label class="text-start mb-0"> Nombre</label>
                        <textarea  class="form-control input-changes" name="name" rows="" data-id-gallery="{{$movie->id}}">{{$movie->name}}</textarea>
                      </div>

                      <div class="text-center pb-1 pt-2">
                        <a href="{{ route('admin.movie.index') }}" class="btn btn-sm btn-light border border-secondary submit-{{$movie->id}} d-none" tabindex="4">Cancelar</a>
                        <button type="submit" class="btn btn-sm btn-primary submit-{{$movie->id}} d-none" tabindex="3">Actualizar cambios</button>
                      </div>
                    </form>
                     <div class="text-center pb-2 submitUpdated-{{$movie->id}}">
                        <form  method="POST" action="{{route('admin.movie.updateIsActive', ['movie' => $movie->id] )}}" class="d-inline">
                          @csrf
                          <input type="hidden" name="state" value="{{$movie->is_active}}">
                          @if ($movie->is_active)
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
                        <form action="{{ route('admin.movie.destroy',$movie->id) }}" method="POST" class="form-delete d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" title="Eliminar" class="btn btn-sm btn-danger text-center"><i class="far fa-trash-alt"></i></button>
                        </form>
                     </div>
                  </div>
                </div>
              @endforeach
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

  <script>
      let fileInput,
      fileImage = document.querySelectorAll('.file_image'),
      letterUpload = document.querySelector('.letter-upload');

      function previewImage(event, id) {
        const $currentImage = document.getElementById(`image-preview-${id}`)

        const file = event.target.files[0]
        const reader = new FileReader(file)
        reader.onload = _ => $currentImage.src = reader.result
        reader.readAsDataURL(file)
      }
  </script>

  <script>
    $(document).ready(function () {
      $('.input-changes').on('input', function (e) {
        const textAreaValue = $(this).val()
        if (textAreaValue != '') {
          $(`.submit-${this.dataset.idGallery}`).removeClass('d-none', false);
        }
      })
    })
  </script>

  <script>
    $(document).ready(function () {
      $('.input-changes').on('input', function (e) {
        const textAreaValue = $(this).val()
        if (textAreaValue != '') {
          $(`.submitUpdated-${this.dataset.idGallery}`).addClass('d-none', true);
        }
      })
    })
  </script>
@endsection

