<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Staff;
use App\Menu_relationship;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $menus = Menu::all();
      return view('menus.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs = Staff::all();
        return view('menus.create', ['staffs' => $staffs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Menu $menu)
    {
      $new_menu = new Menu;
      $new_menu->name = $request->name;
      $new_menu->minutes = $request->minutes;
      $new_menu->save();

      $menu_relationship = new Menu_relationship;
      $menu_relationship->menu_id = $menu->latest_menu()->id;
      $menu_relationship->staff_id = $request->staff_id;
      $menu_relationship->user_id = Auth::id();
      $menu_relationship->timestamps = false;
      $menu_relationship->save();

      return redirect('menus/'.$new_menu->id)->with('status', __('Created a menu.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('menus.show', ['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        // $this->authorize('edit', $menu);
        return view('menus.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        // $this->authorize('edit', $menu);
        $menu->name = $request->name;
        $menu->minutes = $request->minutes;
        $menu->save();
        return redirect('menus/'.$menu->id)->with('status', __('Updated a menu.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        // $this->authorize('edit', $menu);
        $menu->delete();
        return redirect('menus')->with('status', __('Deleted a menu.'));
    }
}
