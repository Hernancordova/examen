<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('client/css/style.css')}}">
    <script src="https://kit.fontawesome.com/842ef3437f.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
    </header>

    <div class="menu">
      <div class="menu-container">
        <div class="language_menu">
            <img class="img-peru" src="{{asset('client/image/peru.png')}}">
            <div class="text-lang">
                <font size="3">Español</font>
            </div>
            <div class="img-hbg">
                <img class="img-hamburger" src="{{asset('client/image/hamburger.png')}}">
            </div>
        </div>

        <div class="logo">
            <img class="img-logo" src="{{asset('client/image/Logo.png')}}" alt="">
        </div>


       <div class="profile">
            <img src="{{ asset('storage/users/'.$user->avatar) }}" alt="img-avatar">
            <div class="active">
            </div>
        </div>
        <div class="name-profile">
           <h2><center>Hernan</center> </h2>
        </div>

        <hr>
        <div class="text-profile">
            <h2>Profile <i class="fa-solid fa-pen-to-square"></i></h2>
        </div>

        <div class="options__menu">
            <ul>
              @foreach ($menus as $menu)
              <li>
                <a href="#" class="selected">
                  <li class="{{$menu->icon}}"></li>
                  <span> {{$menu->name}}</span>
                </a>
              </li>
              @endforeach
            </ul>
        </div>

        <div class="personal-information">
            <p>
                MIS DATOS
                <br>
                <span class="text-personal">Name</span> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp     {{$user->name}} <br>
                <span class="text-personal">Last Name</span> &nbsp &nbsp  {{$user->last_name}}  <br>
                <span class="text-personal">N° Phone</span> &nbsp &nbsp &nbsp   {{$user->phone}} <br>
                <span class="text-personal">N° Card</span> &nbsp &nbsp &nbsp &nbsp {{$user->nro_card}}
            </p>
        </div>
     </div>
    </div>

    <div class="main">
        <div class="banner">
            <img class="img-banner" src="{{asset('client/image/banner.png')}}" alt="">
            <div class="img-decription">
                <!-- <img src="image/img-banner.png" width="309" height="174.21" alt=""> -->

                <div class="row-profile-kids">
                    <div class="banner-card1">
                        <img class="img-banner-card1" src="{{asset('client/image/img-banner.png')}}"  alt="">
                    </div>
                    <div class="banner-card2">
                        <h2>Harry Potter y la piedra filosofal </h2>
                        <p>Harry Potter has been orphaned and lives at the home of his abominable aunt, uncle, and
                            unbearable cousin Dudley. Harry feels very sad and lonely, until one day he receives a letter that will change his life forever.
                            one day he receives a letter that will change his life forever. In it, he is informed that
                            accepted as a student at Hogwarts School of Witchcraft and Wizardry.
                            wizardry. From that moment on, Harry's luck takes a spectacular turn.
                            spectacular. In this special school he will learn enchantments, tricks...
                        </p>
                        <h2>
                            <i class="fa-solid fa-circle-play"></i>
                            <i class="fa-solid fa-heart"></i>
                            <i class="fa-solid fa-clock"></i>
                            <img style="margin-top: 5px;"  src="{{asset('client/image/list-plus.svg')}}" height="15px" width="15px" alt="">
                        </h2>
                    </div>
                </div>
            </div>




        </div>

        <div class="container">
            <div class="heading">
              <h2>Series</h2>
            </div>
            <div class="row">
              @foreach ($movies as $movie )
              <div class="card">
                <div class="card-header">
                  <img class="img-cards" src="{{ asset('storage/movie-image/'.$movie->image) }}" alt="">
                </div>
                <div class="card-body">
                    <small>{{$movie->name}}</small>
                </div>
              </div>
              @endforeach

            </div>
        </div>

        <div class="container">
            <div class="heading">
              <h2>Más populares</h2>
            </div>
            <div class="row">
              @foreach ($movies as $movie )
              <div class="card">
                <div class="card-header">
                  <img class="img-cards" src="{{ asset('storage/movie-image/'.$movie->image) }}" alt="">
                </div>
                <div class="card-body">
                    <small>{{$movie->name}}</small>
                </div>
              </div>
              @endforeach
            </div>
        </div>
        <div class="container-profile-kids">
            <div class="row-profile-kids">
                <div class="card1">
                    <img class="img-card1" src="{{asset('client/image/crea-perfiles.png')}}"  alt="">
                </div>
                <div class="card2">
                  <div class="card-body">
                    <h2>Crea perfiles para niños.</h2>
                    <p>Los niños vivirán aventuras con sus personajes
                        favoritos en un espacio diseñado
                        exclusivamente para ellos, sin costo con tu
                        membresía.
                    </p>
                  </div>
                </div>
            </div>
         </div>




</body>
</html>
