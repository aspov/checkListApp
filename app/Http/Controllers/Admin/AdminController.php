<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\User::role('admin')->orderBy('name')->paginate(10);
        return view('admin.admin.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $permissions = \App\Permission::get();
        $roles = \App\Role::get();
        return view('admin.admin.edit', compact('user', 'permissions', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('edit users');
        $user->fill($request->all());
        $user->save();

        if ($request['roles']) {
            $this->authorize('edit roles');
            $user->syncRoles($request['roles']);
        }
        
        if ($request['permissions']) {
            $this->authorize('edit permissions');
            $user->syncPermissions($request['permissions']);
        }
        
        flash(__('Saved'))->success();
        return redirect()->route('admin.admins.edit', $user);
    }
}
