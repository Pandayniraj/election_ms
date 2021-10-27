<?php

namespace App\Http\Controllers\admin\mastermanagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Weather;

class WeatherController extends Controller
{
    public function index()
    {
        $weathers = Weather::all();
        return view('admin.weather.index',compact('weathers'));
    }

    public function create(Request $req)
    {
        $weather = new Weather;
        $weather->code = $req->input('code');
        $weather->english_name = $req->input('english_name');
        $weather->japanese_name = $req->input('japanese_name');
        $weather->save();

        $data = $req->input('code');
        $req->session()->flash('code',$data);
        return redirect(route('admin.weather.index'));
    }

    public function delete($id)
    {
        $weather = Weather::find($id);
        $weather->delete();
        return redirect()->back();
    }

    public function editForm($id)
    {
        $weather = Weather::find($id);
        return view('admin.weather.edit',compact('weather'));
    }

    public function edit(Request $req)
    {
        $weather = Weather::find($req->id);
        $weather->code = $req->input('code');
        $weather->english_name = $req->input('english_name');
        $weather->japanese_name = $req->input('japanese_name');
        $weather->save();

        $data = $req->input('code');
        $req->session()->flash('edited',$data);
        return redirect(route('admin.weather.index'));
    }

}
