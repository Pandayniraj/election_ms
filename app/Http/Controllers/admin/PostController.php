<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
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
        $post->delete();
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
        $fileName = 'posts.csv';
        $posts = Post::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Post ID', 'Post Name', 'Nepali Post Name', 'Max Count');

        $callback = function() use($posts, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($posts as $key=>$post) {
                $row['Post ID']  = $post->id;
                $row['Post Name']    = $post->post_name;
                $row['Nepali Post Name'] = $post->nepali_post_name;
                $row['Max Count']    = $post->max_count;

                fputcsv($file, array($row['Post ID'], $row['Post Name'], $row['Nepali Post Name'], $row['Max Count']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
