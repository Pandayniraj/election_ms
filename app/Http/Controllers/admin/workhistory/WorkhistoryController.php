<?php

namespace App\Http\Controllers\admin\workhistory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkhistoryController extends Controller
{
    public function index()
    {
        return view('admin.workhistory.index');
    }
}
