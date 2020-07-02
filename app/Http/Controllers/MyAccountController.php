<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MyAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect()->route('account.show', \Auth::user()->name);
    }

    public function show()
    {
        return view('my_account.show');
    }

    public function edit()
    {
        return view('my_account.edit');
    }

  
    public function update(Request $request)
    {
        $user = \Auth::user();
        Validator::make($request->all(), [
            'name' => ['required', Rule::unique('users')->ignore($user), 'string'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)]
        ])->validate();
        $user->fill($request->all());
        $user->save();
        flash(__('Saved'))->success();
        return view('my_account.edit');
    }
    
    public function destroy(User $user)
    {
        \App\User::destroy(\Auth::user()->id);
        flash(__('Deleted'))->success();
        return redirect()->route('home');
    }
}
