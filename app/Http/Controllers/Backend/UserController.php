<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('user-index');
        $users = User::active()->with('role')->get();
        //dd($users);
        //$users = User::all();
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('user-create');
        $roles = Role::all();
        return view('backend.users.form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        Gate::authorize('user-create');

        $user = User::create([
            'role_id' => $request->role,
            'name' => $request->name,
            'name_bn' => $request->name_bn,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->filled('status')
        ]);
        if($user){
            toast('User Added successfully!', 'success');
        }

        toast('Somethong went wrong', 'error');

        return redirect()->route('app.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Gate::authorize('user-update');
        $roles = Role::all();
        return view('backend.users.form', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        Gate::authorize('user-update');

        $user->update([
            'role_id' => $request->role,
            'name' => $request->name,
            'name_bn' => $request->name_bn,
            'email' => $request->email,
            'password' => isset($request->password) ? Hash::make($request->password) : $user->password,
            'status' => $request->filled('status')
        ]);

        toast('User Updated successfully!', 'success');
        return redirect()->route('app.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('user-delete');
        $user->delete();

        toast('User Deleted successfully!', 'success');
        return redirect()->route('app.users.index');
    }
}
