<?php

namespace App\Http\Controllers\admin;

use Image;
use ZipArchive;
use File;
use App\Models\Post;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        $posts = Post::all();
        $status = False;
        foreach($candidates as $candidate)
         {
            $sizecandidate=$candidate->candidate_id;
                if($sizecandidate){
                    $status = True;
                }else{
                    $status = False;
                }
          }
        return view('admin.candidate.index',compact('candidates','status'));
    }

    public function createView()
    {
        $posts = Post::all();
        return view('admin.candidate.create',compact('posts'));

    }


    public function create(Request $req)
    {
       
        // $candidate = $req->image;
       
        // return response()->json(['status'=>$candidate, 'msg'=>'Image has been cropped successfully.']);
        if($req->ajax()){
        $candidate['post_id'] = $req->postname;
        $candidate['nepali_name'] = $req->nepaliname;
        $candidate['english_name'] = $req->englishname;
            
        $image_data = $req->image;
        $image_array_1 = explode(";", $image_data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $candidate['image'] =$image_array_2[1];
       
        // return response()->json(['status'=>1, 'msg'=>'Image has been cropped successfully.']);
        }      
       
        Candidate::create($candidate);
        $data = $req->input('nepname');
        $req->session()->flash('name',$data);
        return response()->json(['status'=>1, 'msg'=>'Image has been cropped successfully.']);
        return redirect()->route('admin.candidate.index');
    }

    public function delete($id)
    {
        $candidate = Candidate::find($id);
        $image =  public_path() . '/uploads/'.$candidate->candidate_id.'.png';
        // $destinationPath = public_path() . '/uploads/';
        if (file_exists($image)) {
            File::delete($image);
        }
        $candidate->delete();
        $this->getCandidate();
        return redirect()->back();

    }

    public function editForm($id)
    {
        $candidate = Candidate::find($id);
        $posts = Post::all();
        return view('admin.candidate.edit',compact('candidate','posts'));
    }

    public function edit(Request $req, $id)
    {
        $candidate = Candidate::find($id);
        $postid = Post::find($req->input('postname'))->id;

        $candidate->post_id = $postid;
        $candidate->nepali_name = $req->input('nepname');
        $candidate->english_name = $req->input('engname');

        // $pid = sprintf("%02d",$postid);
        // $canid = sprintf("%03d",$candidate['id']);

        if ($req->hasFile('photo')) {
            $file= $req->file('photo');
            $ext=$file->getClientOriginalName();
            $image= base64_encode(file_get_contents($req->file('photo')));

            $candidate['image'] =$image;      
        }

        $candidate->save();

        $data = $req->input('name');
        $req->session()->flash('edited',$data);
        return redirect(route('admin.candidate.index'));

    }


    public function export(Request $req)
    {
        $fileName = 'candidates.csv'; 
        $candidates = Candidate::all();
        $candidatedata = DB::table('posts')->selectRaw('count(candidates.id) as candidate_count, posts.max_count, posts.id')->leftjoin('candidates', 'candidates.post_id', '=', 'posts.id')->groupBy('post_id')->get();
    // dd($candidatedata);
        $post=Post::pluck('max_count','id');
    //  dd($post);

        $count = 0;   
            foreach($candidatedata as $candidatedatum){
                if($candidatedatum->candidate_count >= $candidatedatum->max_count )
                {   
                    $count++;
                if($count == sizeof($candidatedata)) {
                    $headers = array(
                        "Content-Encoding"    => "UTF-8",
                        "Content-type"        => "text/csv; charset=UTF-8",
                        "Content-Disposition" => "attachment;filename=$fileName",
                        "Pragma"              => "no-cache",
                        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                        "Expires"             => "0"
                        );
                    $columns = array('Candidate ID', 'Post Name', 'Nepali Name', 'English Name');
                    $callback = function() use($candidates, $columns) {
                        $file = fopen('php://output', 'w');
                        fputcsv($file, $columns);
                        foreach ($candidates as $key=>$candidate) {
                            $row['Candidate ID']  = $candidate->candidate_id;
                            $row['Post Name']    = $candidate->getPosts->post_name;
                            $row['Nepali Name']    =$candidate->nepali_name;
                            $row['English Name']  = $candidate->english_name;
                            fputcsv($file, array($row['Candidate ID'], $row['Post Name'],$row['Nepali Name'],$row['English Name']));
                        }

                        fclose($file);
                    };
                    return response()->stream($callback, 200, $headers);
                }
               
            } else
                {
// dd($candidatedatum->id);
                    $postname = Post::find($candidatedatum->id)->post_name;
                    // dd($postname);
                    $req->session()->flash('wrong',$postname);
                    return redirect()->back();
                }
        }
    }


    public function exportPhoto(Request $req)
    {
        $getcandidates = Candidate::all();

            File::deleteDirectory(public_path('uploads'));
            File::makeDirectory(public_path('uploads'));

        foreach($getcandidates as $getcandidate)
        {
            
            $imageName = $getcandidate->candidate_id. '.png';
            $file = base64_decode($getcandidate->image);
            // $resized_image = Image::make($file)->save('uploads/'.$imageName);
            $success = file_put_contents(public_path() . '/uploads/' . $imageName, $file);
        }
        

        $fileName = 'CandidatePhotos.zip';
        if (file_exists(public_path($fileName))) {
            File::delete(public_path($fileName));
        }
        // file_put_contents(public_path() . $fileName, '');
        $zip = new ZipArchive;
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
            $files = File::files(public_path('uploads'));

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            
            $zip->close();
        }
        
        return response()->download(public_path($fileName));
    }


    public function getCandidate()
    {
        $getallcandidates= Candidate::all()->groupBy('post_id');
        // dd($getallcandidates);
        foreach ($getallcandidates as $key=>$getcandidate){
            // dd($getcandidate[0]->id);
            $countofcandidate=$getcandidate->count();
            for($i=0;$i<$countofcandidate;$i++){
               
                $postid=sprintf('%02s',$key);
                $canid=sprintf('%03s',$i+1);
                $candidate_id=$postid.$canid;
                Candidate::whereId($getcandidate[$i]->id)->update(['candidate_id'=>$candidate_id]);

               

            }
        }
        return redirect(route('admin.candidate.index'));

    }

    public function reset(Request $req)
    {
        $candidates = Candidate::all();
        foreach($candidates as $candidate)
        {
            $destinationPath = public_path() . '/uploads/'.$candidate->candidate_id.'.png';
            File::delete($destinationPath);
            $candidate->delete();
        }
        
        return redirect()->back();

    }
    // function crop(Request $request){
    //     $path = 'files/';
    //     $file = $request->file('file');
    //     $new_image_name = 'UIMG'.date('Ymd').uniqid().'.jpg';
    //     $upload = $file->move(public_path($path), $new_image_name);
    //     if($upload){
    //         return response()->json(['status'=>1, 'msg'=>'Image has been cropped successfully.', 'name'=>$new_image_name]);
    //     }else{
    //           return response()->json(['status'=>0, 'msg'=>'Something went wrong, try again later']);
    //     }
    //   }
}