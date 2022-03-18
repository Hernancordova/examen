<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuNavigationRequest;
use App\Models\MenuNavegation;
use Illuminate\Http\Request;

class NavigationMenuController extends Controller
{
    public function index()
    {
      $menus = MenuNavegation::get();
        return view('admin.navigation-menu.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.navigation-menu.create');
    }

    public function store(StoreMenuNavigationRequest $request)
    {
      $menu = new MenuNavegation();
      $menu->name = $request->name;
      $menu->icon = $request->icon;
      $menu->link = $request->link;
      $menu->save();
      return redirect()->route('admin.menu.index')->with('created', 'Registro guardado exitósamente.');
    }

    public function edit($id)
    {
      $menu = MenuNavegation::whereId($id)->first();
      return view('admin.navigation-menu.edit', compact('menu'));
    }


    public function update(StoreMenuNavigationRequest $request, $id)
    {
      $menu = MenuNavegation::find($id);
      $menu->name = $request->name;
      $menu->icon = $request->icon;
      $menu->link = $request->link;
      $menu->save();
      return redirect()->route('admin.menu.index')->with('updated', 'Registro actualizado exitósamente.');
    }

    public function updateIsActive(Request $request, $id)
    {

      $newState = $request->state ? 0 : 1;
      MenuNavegation::whereId($id)->update([
        'is_active' => $newState
      ]);
      return redirect()->route('admin.menu.index');
    }

    public function destroy($id)
    {
      $menu = MenuNavegation::find($id);
      $menu->delete();

      return redirect()->route('admin.menu.index');
    }
}
