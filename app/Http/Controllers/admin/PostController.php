<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        $allposts= Post::all();
        $status = False;
        foreach($allposts as $post)
         {
            $sizepost=$post->position_id;
                if($sizepost){
                    $status = True;
                }else{
                    $status = False;
                }
          }
        return view('admin.post.index',compact('posts','status'));
    }

    public function create(Request $req)
    {
        $post = new Post;
        $post->post_name = $req->input('name');
        $post->nepali_post_name = $req->input('nepname');

        $post->max_count = $req->input('count');
        $post->save();

        $data = $req->input('name');
        $req->session()->flash('name',$data);
        return redirect(route('admin.post.index'));
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $checkid=Candidate::where('post_id',$id)->first();
        if(empty($checkid)){
            $post->delete();
            $this->getPost();
            $data="Delete Successful!";
            session()->flash('deletesuccess',$data);
           
        }
        else{
            $data="Cannot Delete! Candidates exist in this post";
            session()->flash('postdelete',$data);
           
        }  
        return redirect()->back();      

    }

    public function editForm($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit',compact('post'));
    }

    public function edit(Request $req)
    {
        $post = Post::find($req->id);
        $post->post_name = $req->input('name');
        $post->nepali_post_name = $req->input('nepname');

        $post->max_count = $req->input('count');
        $post->save();

        $data = $req->input('name');
        $req->session()->flash('edited',$data);
        return redirect(route('admin.post.index'));
    }

    public function export(Request $req)
    {
        $fileName = 'posts.txt';
        $posts = Post::all();

        $headers = array(
            "Content-type"        => "text/txt",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0",
            
        );

        $columns = array('Post ID', 'Post Name', 'Nepali Post Name', 'Max Count');

        $callback = function() use($posts, $columns) {
            $file = fopen('php://output', 'w');
            // fputcsv($file, $columns);

            foreach ($posts as $key=>$post) {

                // $row['Post ID']  = trim($post->id, '"');
                // $row['Post Name']    = $post->post_name;
                // $row['Nepali Post Name'] = $post->nepali_post_name;
                // $row['Max Count']    = $post->max_count;
                $array = str_replace('"', '', $post);

            fputs($file, implode(',', array($post->id."\t".$post->nepali_post_name."\t".$post->post_name."\t".$post->max_count))."\n");
                // fputcsv($file, array($row['Post ID'].'  '.$row['Post Name'].'  '. $row['Nepali Post Name'].'  '.$row['Max Count']),'', '"');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // public function getPost(Request $req)
    // {
    //     return "Hello";
    // }
    public function getPost()
    {
        $getallposts= Post::all();
        // return $getallposts;
        // dd($getallcandidates);
        // foreach ($getallposts as $getpost){
            //  dd($getallposts[2]->id);
            // dd($getpost[0]->id);
            $countofpost=$getallposts->count();
            for($i=0;$i<$countofpost;$i++){
               
                $postid=sprintf('%02s',$i+1);
                // $canid=sprintf('%03s',$i+1);
                // $post_id=$postid.$canid;
                // Post::whereId($getpost[$i]->id)->update(['post_id'=>$postid]);
                Post::whereId($getallposts[$i]->id)->update(['position_id'=>$postid]);

               

            }
        // }
        return redirect(route('admin.post.index'));

    }

}
