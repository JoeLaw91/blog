<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
//        dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255|min:7',
        ]);
//        dd(old('name'));
//        dd($validator->errors());
//        $attributes = $request->validate([
//            'name' => 'required|max:255',
//            'username' => 'required|max:255|min:3|unique:users,username',
//            'email' => 'required|email|max:255|unique:users,email',
//            'password' => 'required|max:255|min:7',
//        ]);

        if ($validator->fails()) {
//            dd($validator->errors());
            return redirect('/register')
                ->withErrors($validator->errors())
                ->withInput();
        }
        $attributes = $request->all();
        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        auth()->login($user);

        session()->flash('success', 'Your account has been created');

        return redirect('/');
    }
}
