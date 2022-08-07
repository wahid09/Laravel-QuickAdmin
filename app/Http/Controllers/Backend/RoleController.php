<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Models\Module;
use App\Repository\ModuleRepositoryInterface;
use App\Repository\Role\RoleRepository;
use App\Repository\Role\RoleRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    private $roleRepository;
    private $moduleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository, ModuleRepositoryInterface $moduleRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->moduleRepository = $moduleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('role-index');
        $roles = $this->roleRepository->index();
        return view('backend.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('role-create');
        $modules = $this->moduleRepository->moduleWithPermission();
        return view('backend.roles.form', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        Gate::authorize('role-create');

//        Role::create([
//            'name' => $request->name,
//            'name_bn' => $request->name_bn,
//            'slug' => Str::slug($request->name),
//        ])->permissions()->sync($request->input('permissions'), []);

        $data = [
            'name' => $request->name,
            'name_bn' => $request->name_bn,
            'slug' => Str::slug($request->name),
        ];

        $role = $this->roleRepository->create($data)->permissions()->sync($request->input('permissions'), []);
        \LogActivity::addToLog('Role Added!.');
        toast('Role Added.', 'success');
        return redirect()->route('app.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('role-update');
        $modules = $this->moduleRepository->moduleWithPermission();
        return view('backend.roles.form', compact('modules', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function pr($data){
        echo "<pre>";
        print_r($data);
        exit();
    }
    public function update(RoleRequest $request, Role $role)
    {
        Gate::authorize('role-update');
        $role->update([
            'name' => $request->name,
            'name_bn' => $request->name_bn,
            'slug' => Str::slug($request->name),
        ]);


//        $data = [
//            'name' => $request->name,
//            'name_bn' => $request->name_bn,
//            'slug' => Str::slug($request->name),
//        ];
//
//        $role = $this->roleRepository->update($role, $data);
        //$this->pr($role);
//        if($role){
//            $role->permissions()->sync($request->input('permissions'));
//        }
        $role->permissions()->sync($request->input('permissions'));
        \LogActivity::addToLog('Role Updated!.');
        toast('Role Updated.', 'success');
        return redirect()->route('app.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Gate::authorize('role-delete');
        if ($role->deletable) {
            $this->roleRepository->delete($role);
            \LogActivity::addToLog('Role Deleted!.');
            toast('Role Deleted.', 'success');
        } else {
            toast('You can\'t delete system role', 'error');
        }
        return back();
    }
}
