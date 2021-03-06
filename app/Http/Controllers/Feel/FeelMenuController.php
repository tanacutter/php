<?php

namespace App\Http\Controllers\Feel;

use App\Http\Controllers\Controller;
use App\Feel;
use Illuminate\Http\Request;

class FeelMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Feel $feel)
    {
        // $feel = new Feel();
        return view('feels.menu', ['feel' => $feel]);
    }

}
