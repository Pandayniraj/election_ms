<?php

namespace App\Http\Controllers\admin\shipschedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipschedule;
use App\Models\Ship;
use App\Models\Shippingcompany;
use Illuminate\Support\Facades\Session;

class ShipscheduleController extends Controller
{
    public function index()
    {
        $schedules = Shipschedule::all();
        $shipcompany = Shipschedule::with('shipcompanies')->get();
        $ship = Shipschedule::with('ships')->get();
        return view('admin.shipschedule.index',compact('schedules','shipcompany','ship'));
    }

    public function detailView($id)
    {
        $schedule = Shipschedule::find($id);
        $companyid = Shippingcompany::find($schedule->shippingcompany_id)->ship_company_name;
        $shipid = Ship::find($schedule->ship_id)->callsing;

        return view('admin.shipschedule.scheduleview',compact('schedule','companyid','shipid'));
    }

    public function createView()
    {
        $ships = Ship::all();
        $shipcompanies = Shippingcompany::all();
        return view('admin.shipschedule.create',compact('shipcompanies','ships'));

    }

    public function create(Request $req)
    {
        $companyid = Shippingcompany::find($req->input('operating_ship_company'))->id;
        $shipid = Ship::find($req->input('callsing'))->id;


        $schedule = new Shipschedule;
        $schedule->next_term = $req->input('nextterm');
        $schedule->import_voy = $req->input('import');
        $schedule->export_voy = $req->input('export');
        $schedule->port_of_entering = $req->input('port');
        $schedule->a_pile = $req->input('pile');
        $schedule->a_landing = $req->input('landing');
        $schedule->cut_date = $req->input('cut_date');
        $schedule->ETA = $req->input('eta');
        $schedule->ETB = $req->input('etb');
        $schedule->ETD = $req->input('etd');
        $schedule->ATD1 = $req->input('atd1');
        $schedule->ATD2 = $req->input('atd2');
        $schedule->ATD3 = $req->input('atd3');
        $schedule->remarks = $req->input('remarks');
        $schedule->shippingcompany_id = $companyid;
        $schedule->ship_id = $shipid;

        $schedule->save();

        $data = $companyid;
        Session::flash('companyid',$data);


        return redirect(route('admin.schedule.index'));
    }

    public function delete($id)
    {
        $schedule = Shipschedule::find($id);
        $schedule->delete();
        return redirect()->back();
    }

    public function editForm($id)
    {
        $schedule = Shipschedule::find($id);
        $shipcompanies = Shippingcompany::all();
        $ships = Ship::all();
        return view('admin.shipschedule.edit',compact('ships','shipcompanies','schedule'));
    }

    public function edit(Request $req)
    {

        $companyid = Shippingcompany::find($req->input('operating_ship_company'))->id;
        $shipid = Ship::find($req->input('callsing'))->id;


        $schedule = Shipschedule::find($req->id);
        $schedule->next_term = $req->input('nextterm');
        $schedule->import_voy = $req->input('import');
        $schedule->export_voy = $req->input('export');
        $schedule->port_of_entering = $req->input('port');
        $schedule->a_pile = $req->input('pile');
        $schedule->a_landing = $req->input('landing');
        $schedule->cut_date = $req->input('cut_date');
        $schedule->ETA = $req->input('eta');
        $schedule->ETB = $req->input('etb');
        $schedule->ETD = $req->input('etd');
        $schedule->ATD1 = $req->input('atd1');
        $schedule->ATD2 = $req->input('atd2');
        $schedule->ATD3 = $req->input('atd3');
        $schedule->remarks = $req->input('remarks');
        $schedule->shippingcompany_id = $companyid;
        $schedule->ship_id = $shipid;

        $schedule->save();

        $data = $req->input('id');
        $req->session()->flash('edited',$data);
        return redirect(route('admin.schedule.index'));
    }
}
