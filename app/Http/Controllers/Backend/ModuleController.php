<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleRequest;
use App\Models\Module;
use App\Repository\ModuleRepositoryInterface;
use App\Repository\Permission\PermissionRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $moduleRepository;
    private $permissionRepository;

    public function __construct(ModuleRepositoryInterface $moduleRepository, PermissionRepositoryInterface $permissionRepository)
    {
        $this->moduleRepository = $moduleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        Gate::authorize('module-index');
        $modules = $this->moduleRepository->index();
        return view('backend.modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('module-create');
        return view('backend.modules.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleRequest $request)
    {
        Gate::authorize('module-create');
        DB::beginTransaction();
        try {
            $module = [
                'name' => $request->name,
                'name_bn' => $request->name_bn
            ];
            $module = $this->moduleRepository->create($module);
            //dd($module->id);
            $permissions = $this->permissionRepository->permission_automation($module->id, $module->name);
            DB::commit();
            \LogActivity::addToLog('Module Added!.');
            toast('Module Added!', 'success');

            return redirect()->route('app.modules.index');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        Gate::authorize('module-index');
        return $this->moduleRepository->show($module);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        Gate::authorize('module-update');
        return view('backend.modules.form', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleRequest $request, Module $module)
    {
        Gate::authorize('module-update');
        DB::beginTransaction();
        try {
            $data = [
                'name' => $request->name,
                'name_bn' => $request->name_bn
            ];
            $modules = $this->moduleRepository->update($module, $data);
            $permissions = $this->permissionRepository->update_permission_automation($module->id, $request->name);
            //return $permissions;
            DB::commit();
            \LogActivity::addToLog('Module updated!.');
            toast('Module updated!', 'success');
            return redirect()->route('app.modules.index');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        Gate::authorize('module-delete');
        try {
            if($module->permissions()->count()){
                toast( "Can't delete, Module has permission record.", 'success');
                return redirect()->back();
            }
            $this->moduleRepository->delete($module);
            \LogActivity::addToLog('Module has been deleted!.');
            toast('Module deleted!', 'success');
            return redirect()->route('app.modules.index');

        } catch (\Exception $e) {
            throw $e;
        }
    }
}
