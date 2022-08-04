<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Auth;

class LogActivityController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $logs = \LogActivity::logActivityLists();
        return view('backend.logs.index', compact('logs'));
    }

    public function store()
    {
        \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }
    public function delete($id){
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
