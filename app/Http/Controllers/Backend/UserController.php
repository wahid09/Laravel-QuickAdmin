<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Repository\Role\RoleRepositoryInterface;
use App\Repository\User\UserRepository;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private $userRepository, $roleRepository;

    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('user-index');
        $users = $this->userRepository->index();
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
        $roles = $this->roleRepository->index();
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

        if ($request->image) {
            $imageName = image($request->image, $request->name, 'user', 300, 300);
        } else {
            $imageName = null;
        }
        $data = [
            'role_id' => $request->role,
            'name' => $request->name,
            'name_bn' => $request->name_bn,
            'email' => $request->email,
            'image' => $imageName,
            'password' => Hash::make($request->password),
            'status' => $request->filled('status')
        ];

        $user = $this->userRepository->create($data);
        toast('User Added successfully!', 'success');

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
        $roles = $this->roleRepository->index();
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

        if ($request->image) {
            $imageName = image($request->image, $request->name, 'user', 300, 300);
        } else {
            $imageName = null;
        }

        if (!empty($imageName)) {
            if (Storage::disk('public')->exists('user/' . $user->image)) {
                Storage::disk('public')->delete('user/' . $user->image);
            }
        }

        if (empty($imageName) && !empty($user->image)) {
            $imageName = $user->image;
        }
        $data = [
            'role_id' => $request->role,
            'name' => $request->name,
            'name_bn' => $request->name_bn,
            'email' => $request->email,
            'image' => $imageName,
            'password' => isset($request->password) ? Hash::make($request->password) : $user->password,
            'status' => $request->filled('status')
        ];
        $user = $this->userRepository->update($user, $data);

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
        $this->userRepository->delete($user);

        if (!empty($user->image)) {
            if (Storage::disk('public')->exists('user/' . $user->image)) {
                Storage::disk('public')->delete('user/' . $user->image);
            }
        }

        toast('User Deleted successfully!', 'success');
        return redirect()->route('app.users.index');
    }
}
