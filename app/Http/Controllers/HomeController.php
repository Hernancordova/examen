<?php

namespace App\Http\Controllers;

use App\Models\MenuNavegation;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
      $movies = Movie::where('is_active', 1)->get();
      $user = User::first();
      $menus = MenuNavegation::where('is_active', 1)->get();
      return view('client.index', compact('menus', 'user', 'movies'));
    }
}
