<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {
        //validate
        $this->validate($request, [
            'name'      => ['required', 'string', 'max:255'],
            'surname'   => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        //create
        $user = new User($request->all());
        $user->save();

        return back()->with('message', 'User '.$user->name.' '.$user->surname.' added');
    }
}
