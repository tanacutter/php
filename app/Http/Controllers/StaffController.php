<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Http\Requests\UpdateStaff;

class StaffController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $staffs = Staff::all();
      return view('staffs.index', ['staffs' => $staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $staff = new Staff;
      $staff->name = $request->name;
      $staff->yomi = $request->yomi;
      $staff->sex = $request->sex;
      $staff->img = $request->img;
      $staff->save();
      return redirect('staffs/'.$staff->id)->with('status', __('Created a user.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        $staff->calendars = $staff->calendars()->paginate(5);
        return view('staffs.show', ['staff' => $staff]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        // $this->authorize('edit', $staff);
        return view('staffs.edit', ['staff' => $staff]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        // $this->authorize('edit', $user);
        $staff->name = $request->name;
        $staff->yomi = $request->yomi;
        $staff->sex = $request->sex;
        $staff->img = $request->img;
        $staff->save();
        return redirect('staffs/'.$staff->id)->with('status', __('Updated a user.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        // $this->authorize('edit', $user);
        $staff->delete();
        return redirect('staffs')->with('status', __('Deleted a user.'));
    }
}
