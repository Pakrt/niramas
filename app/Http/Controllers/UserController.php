<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show ($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        if($request->hasFile('avatar'))
        {
            $request->file('avatar')->move('images/users/',$request->file('avatar')->getClientOriginalName());
            $user->avatar = $request->file('avatar')->getClientOriginalName();
            $user->save();
        }
        return redirect('/karyawan')->with('status', 'Data berhasil diupdate !!');
    }
}
