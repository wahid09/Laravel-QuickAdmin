<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Gate;

class LogActivityController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        Gate::authorize('log-index');
        $logs = \LogActivity::logActivityLists();
        return view('backend.logs.index', compact('logs'));
    }

    public function store()
    {
        \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }
    public function delete($id){
        Gate::authorize('log-delete');
        try {
            $log = LogActivity::findOrFail($id);
            $log->delete($log);
            toast('Log deleted!', 'success');
            \LogActivity::addToLog('Log deleted.');
            return redirect()->route('app.log_list');
        }catch(\Exception $e){
            throw $e;
        }
    }
}
