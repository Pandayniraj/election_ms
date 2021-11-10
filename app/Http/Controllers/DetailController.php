<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Candidate;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(){
        $post = Post::pluck('nepali_post_name');
        $max_count = Post::pluck('max_count');
        $post_candiates = Post::withCount('getCandidates')->get();

        for($i=0 ;$i<sizeof($post_candiates);$i++){

            $total_candidates[$i] =  $post_candiates[$i]->get_candidates_count;
            
        }
        $countpost = Post::count();
        $countcandidate = Candidate::count();
        return view('admin.layouts.firstview',compact('countpost','countcandidate','post','max_count','total_candidates'));

    }


}
