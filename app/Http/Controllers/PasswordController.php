<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function change()
    {
        return view('auth.passwords.change');
    }

    public function update()
    {
        //custom validator
        Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, Auth::user()->password);
        });

        // message for custom validation
        $messages = [
            'password' => 'Invalid current password.',
        ];

        // validate form
        $validator = Validator::make(request()->all(), [
            'current_password'      => 'required|password',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required',

        ], $messages);

        // if validation fails
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }
        // update password
        $user = User::find(Auth::id());

        $user->password = bcrypt(request('password'));
        $user->save();
        return redirect('/password')->with('status', 'Password berhasil diganti !!');
    }
}
