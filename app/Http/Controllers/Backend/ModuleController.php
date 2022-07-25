<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleRequest;
use App\Models\Module;
use App\Repository\ModuleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $moduleRepository;

    public function __construct(ModuleRepositoryInterface $moduleRepository)
    {
        $this->moduleRepository = $moduleRepository;
    }

    public function index()
    {
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
        $module = [
            'name' => $request->name,
            'name_bn' => $request->name_bn
        ];
        $module = $this->moduleRepository->create($module);
        toast('Module Added!', 'success');

        return redirect()->route('app.modules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
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
        $data = [
            'name' => $request->name,
            'name_bn' => $request->name_bn
        ];
        $module = $this->moduleRepository->update($module, $data);
        toast('Module updated!', 'success');
        return redirect()->route('app.modules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $this->moduleRepository->delete($module);
        toast('Module deleted!', 'success');
        return redirect()->route('app.modules.index');
    }
}
