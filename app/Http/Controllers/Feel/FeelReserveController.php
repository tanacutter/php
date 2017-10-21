<?php

namespace App\Http\Controllers\Feel;

use App\Http\Controllers\Controller;
use App\Feel;
use Illuminate\Http\Request;

class FeelReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'reserve';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feel  $feel
     * @return \Illuminate\Http\Response
     */
    public function show(Feel $feel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feel  $feel
     * @return \Illuminate\Http\Response
     */
    public function edit(Feel $feel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feel  $feel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feel $feel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feel  $feel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feel $feel)
    {
        //
    }
}
