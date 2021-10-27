<?php

namespace App\Http\Controllers\admin\manageoutput;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OutputController extends Controller
{
    public static function index()
    {
        return view('admin.manageoutput.index');
    }
}
