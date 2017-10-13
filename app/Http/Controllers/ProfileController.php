<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Http\Requests\UpdateUser;

class ProfileController extends Controller
{

    /**
     * Only login user can see.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user->calendars = $user->calendars()->paginate(5);
        return view('profiles.index', ['profile' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->calendars = $user->calendars()->paginate(5);
        return view('profiles.index', ['profile' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        return view('profiles.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        $this->authorize('edit', $user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('profiles/'.$user->id)->with('status', __('Updated a user.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('edit', $user);
        $user->delete();
        return redirect('profiles')->with('status', __('Deleted a user.'));
    }
}
