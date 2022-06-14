<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Progress;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function index()
    {
        $progress = Progress::orderBy('created_at', 'desc')->get();
        return view('admin.researcher_progress', ['progress' => $progress]);
    }

    public function show($id)
    {
        $progress = Progress::findOrFail($id);
        return view('admin.researcher_progress_show', ['progress' => $progress]);
    }
}
