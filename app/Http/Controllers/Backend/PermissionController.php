<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\PermissionRequest;
use App\Models\Module;
use App\Models\Permission;
use App\Repository\Permission\PermissionRepository;
use App\Repository\Permission\PermissionRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    private $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('permission-index');
        $permissions = $this->permissionRepository->index();
        return view('backend.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('permission-create');
        $modules = $this->permissionRepository->allName();
        return view('backend.permissions.form', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        Gate::authorize('permission-create');

        $data = [
            'module_id' => $request->module,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];

        $permission = $this->permissionRepository->create($data);
        \LogActivity::addToLog('Permission Added!.');
        toast('Permission Added', 'success');

        return redirect()->route('app.permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        Gate::authorize('permission-update');
        $modules = $this->permissionRepository->allName();
        return view('backend.permissions.form', compact('modules', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        Gate::authorize('permission-update');

        $data = [
            'module_id' => $request->module,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];

        $permission = $this->permissionRepository->update($permission, $data);
        \LogActivity::addToLog('Permission Updated!.');
        toast('Permission Updated', 'success');
        return redirect()->route('app.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        Gate::authorize('permission-delete');
        $this->permissionRepository->delete($permission);
        \LogActivity::addToLog('Permission Deleted!.');
        toast('Permission Deleted', 'success');
        return back();
    }
}
