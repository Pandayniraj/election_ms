<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Videolink;
use Illuminate\Http\Request;
use Response;


class LinkApiController extends Controller
{
    public function index()
    {
        // $vlinks = Videolink::all();

         $vlinks = Videolink::orderBy('id','desc')->first();
        return view('admin.videolink.index', compact('vlinks'));
    }
    public function apiIndex()
    {
        // $vlinks = Videolink::all();

         $vlinks = Videolink::orderBy('id','desc')->first();
        //  return Response::json($vlinks);
        return $this->sendResponse($vlinks->toArray(), 'Video Link retrieved successfully');
       
    }

    public function createlink(Request $req)
    {
        $videolinks = new Videolink;
        $videolinks->video_link = $req->videolink; 
        $videolinks->save();

        $data = $req->input('name');
        $req->session()->flash('name',$data);
        return redirect(route('admin.videolinkindex'));
    }

    public function delete($id)
    {
        $vlinks = Videolink::find($id);
            $vlinks->delete();
            $data="Delete Successful!";
            session()->flash('deletesuccess',$data);   
        return redirect()->back();      
    }

    public function editForm($id)
    {
        $vidlinks = Videolink::find($id);
        return view('admin.videolink.edit',compact('vidlinks'));
    }

    public function edit(Request $req, $id)
    {
        $vidlink = Videolink::find($id);
        $vidlink->video_link = $req->videolink;    
        $vidlink->save();

        $data = $req->input('name');
        $req->session()->flash('edited',$data);
        return redirect(route('admin.videolinkindex',compact('vidlink')));
    }

}
