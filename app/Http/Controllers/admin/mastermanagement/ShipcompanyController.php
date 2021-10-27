<?php

namespace App\Http\Controllers\admin\mastermanagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shippingcompany;

class ShipcompanyController extends Controller
{
    public function index()
    {
        $shipcompanies = Shippingcompany::all();
        return view('admin.shipcompany.index',compact('shipcompanies'));
    }

    public function create(Request $req)
    {
        $shipcompany = new Shippingcompany;
        $shipcompany->code = $req->input('code');
        $shipcompany->ship_company_name = $req->input('ship_company_name');
        $shipcompany->remarks = $req->input('remarks');
        $shipcompany->save();

        $data = $req->input('ship_company_name');
        $req->session()->flash('ship_company_name',$data);
        return redirect(route('admin.shipcompany.index'));
    }

    public function delete($id)
    {
        $shipcompany = Shippingcompany::find($id);
        $shipcompany->delete();
        return redirect()->back();
    }

    public function editForm($id)
    {
        $shipcompany = Shippingcompany::find($id);
        return view('admin.shipcompany.edit',compact('shipcompany'));
    }

    public function edit(Request $req)
    {
        $shipcompany = Shippingcompany::find($req->id);
        $shipcompany->code = $req->input('code');
        $shipcompany->ship_company_name = $req->input('ship_company_name');
        $shipcompany->remarks = $req->input('remarks');
        $shipcompany->save();

        $data = $req->input('ship_company_name');
        $req->session()->flash('edited',$data);
        return redirect(route('admin.shipcompany.index'));
    }
}
