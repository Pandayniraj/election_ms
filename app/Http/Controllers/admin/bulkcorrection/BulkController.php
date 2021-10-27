<?php

namespace App\Http\Controllers\admin\bulkcorrection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BulkController extends Controller
{
    public function index()
    {
        return view('admin.bulkcorrection.index');
    }
}
