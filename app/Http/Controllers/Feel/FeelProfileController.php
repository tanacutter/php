<?php

namespace App\Http\Controllers\Feel;

use App\Http\Controllers\Controller;
use App\Feel;
use Illuminate\Http\Request;

class FeelProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Feel $feel)
    {
        return view('feels.profile', ['feel' => $feel]);
    }
}
