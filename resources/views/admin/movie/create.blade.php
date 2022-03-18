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
      height: 300px;
      position: relative;
      border-radius: 10px;
      border-radius: inherit;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 0;
      overflow: auto;
      border: 1px solid #8fc4f9;
    }

    .file_container::-webkit-scrollbar {
      width: 10px;
      height: 10px;
      display: block;
    }
    .file_container::-webkit-scrollbar-thumb {
      background-color: rgb(145, 145, 145);
      border-radius: 20px;
    }

    .file_container::-webkit-scrollbar-track {
      background-color: white;
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
    .color-upload-img{
      color: #5f9eff;
    }
    .color-img-upload{
      color: rgb(50, 50, 114);
    }
    .card{

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
              <i class="fas fa-images"></i>
              Nueva película
            </h6>
          </div>
          <hr>
          {{-- @if (count($errors->all()))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
              @foreach ($errors->all() as $message)
                <li>{{$message}}</li>
              @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif --}}
           <form action="{{ route('admin.movie.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div style="1px solid #1b82ec; background:#e4f4ff;" class="card" >
                    <div style="" class="file_container">
                      <input type="file" class="file_input" id="file_input" name="image" accept="image/*">
                      <img id="file_image" class="file_image">
                    <div id="letter-upload" class="file_letter">
                      <div class="text-center">
                          <h1 class="color-upload-img"><i class="fas fa-upload"></i></h1>
                      </div>
                        <h2 class="color-img-upload">Selecione una imagen</h2>
                        <hr>
                        <center>
                          <h6 class="color-upload-img">
                            O arrastra una imagen
                          </h6>
                        </center>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="description" class="form-label">Nombre
                      <span class="span-reqrired">*</span>
                    </label>
                      <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" placeholder="Complete este campo...">
                  </div>
                </div>
              </div>
              <a href="{{ route('admin.movie.index') }}" class="btn btn-danger">Cancelar</a>
              <button type="submit" class="btn btn-primary">Guardar <i class="far fa-paper-plane"></i></button>
           </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script>
      let fileInput,
      fileImage = document.querySelector('#file_image'),
      letterUpload = document.querySelector('#letter-upload');

      if(fileInput = document.querySelector('#file_input')) {
      fileInput.addEventListener('change', function (e) {
      const file = e.target.files[0]
      const reader = new FileReader(file)
      reader.onload = (e) => fileImage.src = reader.result
      reader.readAsDataURL(file)
      letterUpload.style.opacity = '0'
    })
  }
  </script>
@endsection


