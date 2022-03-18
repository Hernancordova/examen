<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


  public function index()
  {
    $users = User::all();
    return view('admin.users.index', compact('users'));
  }

  public function create()
  {
    return view('admin.users.create');
  }

  public function store(StoreUserRequest $request)
  {
    $users = new User();
    $users->name = $request->name;
    $users->nick_name = $request->nick_name;
    $users->email = $request->email;
    $users->last_name = $request->last_name;
    $users->phone = $request->phone;
    $users->nro_card = $request->nro_card;
    if($request->file("avatar")) {
      $namefile = Carbon::now()->format("dmYHis").".".$request->file('avatar')->getClientOriginalExtension();
      $request->file('avatar')->storeAs('public/users', $namefile);
      $users->avatar = $namefile;
    }

    $users->password = Hash::make("netflix");
    $users->save();

    return redirect()->route('usuario.index')->with('created', 'Registro guardado exitósamente.');
  }

  public function edit($id) {
    $user = User::whereId($id)->first();
    return view('admin.users.edit', compact('user'));
  }

  public function update(StoreUserRequest $request, $id)
  {
    $users = User::find($id);
    $users->name = $request->name;
    $users->nick_name = $request->nick_name;
    $users->email = $request->email;
    $users->last_name = $request->last_name;
    $users->phone = $request->phone;
    $users->nro_card = $request->nro_card;
    if($request->file("avatar")) {
      $namefile = Carbon::now()->format("dmYHis").".".$request->file('avatar')->getClientOriginalExtension();
      $request->file('avatar')->storeAs('public/users', $namefile);
      $users->avatar = $namefile;
    }
    $users->save();

    return redirect()->route('usuario.index')->with('updated', 'Registro actualizado exitósamente.');
  }

  public function show($id)
  {
    //
  }


  public function destroy($id)
  {
    $user = User::find($id);
    $user->delete();

    return redirect()->route('usuario.index')->with('deleted', 'Registro eliminado exitósamente.');
  }

  public function updateIsActive(Request $request, $id)
  {
    $newState = $request->state ? 0 : 1;
    User::whereId($id)->update([
      'is_active' => $newState
    ]);
    return redirect()->route('usuario.index');
  }

}
