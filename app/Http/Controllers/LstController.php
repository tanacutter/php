<?php

namespace App\Http\Controllers;

use App\Lst;
use Illuminate\Http\Request;

class LstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lsts.index');
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
     * @param  \App\Lst  $lst
     * @return \Illuminate\Http\Response
     */
    public function show(Lst $lst)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lst  $lst
     * @return \Illuminate\Http\Response
     */
    public function edit(Lst $lst)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lst  $lst
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lst $lst)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lst  $lst
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lst $lst)
    {
        //
    }
}
