<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ReserveController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('reserves.show', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 予約完了メール
        
        return redirect('profiles/'.$user->id)->with('status', __('ご予約完了しました。'));
    }

}
