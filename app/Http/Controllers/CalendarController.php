<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;
use App\Staff;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
  /**
   * Auth except index
   *
   */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calendars = Calendar::orderBy('available_time', 'desc')->get();
        return view('calendars.index', ['calendars' => $calendars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Calendar $calendar)
    {
        $calendar->staffs = Staff::all()->where('user_id', Auth::id());
        return view('calendars.create', ['calendar' => $calendar]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $calendar = new Calendar;
        $calendar->user_id = $request->user()->id;
        $calendar->available_time = $request->available_time;
        $calendar->staff_id = $request->staff_id;
        $calendar->save();
        return redirect('calendars/' . $calendar->id)->with('status', __('Created new cal.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
    {
        return view('calendars.show', ['calendar' => $calendar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendar $calendar)
    {
        $this->authorize('edit', $calendar);
        return view('calendars.edit', ['calendar' => $calendar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calendar $calendar)
    {
        $this->authorize('edit', $calendar);
        $calendar->available_time = $request->available_time;
        $calendar->save();
        return redirect('calendars/'.$calendar->id)->with('status', __('Updated an article.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendar $calendar)
    {
        $this->authorize('edit', $calendar);
        $calendar->delete();
        return redirect('calendars.index')->with('status', __('Deleted an article.'));
    }
}
