<?php

namespace App\Http\Controllers\Feel;

use App\Http\Controllers\Controller;
use App\Feel;
use Illuminate\Http\Request;

class FeelController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Feel  $feel
     * @return \Illuminate\Http\Response
     */
    public function show(Feel $feel)
    {
        return view('feels.top', ['feel' => $feel]);
    }

}
