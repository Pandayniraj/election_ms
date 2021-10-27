<?php

namespace App\Http\Controllers\admin\mastermanagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ship;
use App\Models\Shippingcompany;

class VesselController extends Controller
{
    public function index()
    {
        $ships = Ship::all();
        $shipcompany = Ship::with('shipcompanies')->get();
        return view('admin.vessel.index',compact('ships','shipcompany'));
    }

    public function createView()
    {
        $shipcompanies = Shippingcompany::all();
        return view('admin.vessel.create',compact('shipcompanies'));
    }

    public function create(Request $req)
    {
        $ship = new Ship;
        $ship->callsing = $req->input('callsing');
        $ship->ship_name = $req->input('shipname');
        $ship->number_of_hatches = $req->input('hatchesnumber');
        $ship->remarks = $req->input('remarks');
        $ship->shippingcompany_id = $req->input('shipping_company_id');
        $ship->save();

        $data = $req->input('shipname');
        $req->session()->flash('shipname',$data);
        return redirect(route('admin.vessel.index'));
    }

    public function delete($id)
    {
        $ship = Ship::find($id);
        $ship->delete();
        return redirect()->back();
    }

    public function editForm($id)
    {
        $ship = Ship::find($id);
        // $shipcompanies = Ship::with('shipcompanies')->get();
        $shipcompanies = Shippingcompany::all();

        return view('admin.vessel.edit',compact('ship','shipcompanies'));
    }

    public function edit(Request $req)
    {
        $ship = Ship::find($req->id);
        $ship->callsing = $req->input('callsing');
        $ship->ship_name = $req->input('shipname');
        $ship->number_of_hatches = $req->input('hatchesnumber');
        $ship->remarks = $req->input('remarks');
        $ship->shippingcompany_id = $req->input('shipping_company_id');
        $ship->save();

        $data = $req->input('shipname');
        $req->session()->flash('edited',$data);
        return redirect(route('admin.vessel.index'));
    }
}
