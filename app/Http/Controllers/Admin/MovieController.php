<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $movies = Movie::get();
        return view('admin.movie.index', compact('movies'));
    }

    public function create()
    {
        return view('admin.movie.create');
    }

    public function store(Request $request)
    {
      $movie = new Movie();
      if ($request->file('image')) {
        $namefile = Carbon::now()->format("dmYHis") . "." . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/movie-image', $namefile);
        $movie->image = $namefile;
      }
      $movie->name = $request->name;
      $movie->save();
      return redirect()->route('admin.movie.index')->with('created', 'Registro guardado exitósamente.');
    }

    public function update(Request $request, $id)
    {
      $movie = Movie::find($id);
      if ($request->file('image')) {
        $namefile = Carbon::now()->format("dmYHis") . "." . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/movie-image', $namefile);
        $movie->image = $namefile;
      }
      $movie->name = $request->name;
      $movie->save();
      return redirect()->route('admin.movie.index')->with('created', 'Registro guardado exitósamente.');
    }

    public function destroy($id)
    {
      $movie = Movie::find($id);
      $movie->delete();
      return redirect()->route('admin.brands.index')->with('deleted', 'Eliminado');
    }

    public function updateIsActive(Request $request, $id)
    {

      $newState = $request->state ? 0 : 1;
      Movie::whereId($id)->update([
        'is_active' => $newState
      ]);
      return redirect()->route('admin.movie.index');
    }
}
