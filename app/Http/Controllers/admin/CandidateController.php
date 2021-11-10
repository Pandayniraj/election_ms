<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Post;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use ZipArchive;

class CandidateController extends Controller
{
    public function index(Request $req)
    {

        $toSearch = $req->searchresult;
        $posts = Post::all();
        $allcandidates = Candidate::all();
        $status = false;
        foreach ($allcandidates as $candidate) {
            $sizecandidate = $candidate->candidate_id;
            if ($sizecandidate) {
                $status = true;
            } else {
                $status = false;
            }
        }
            $candidates = Candidate::orderBy('created_at', 'desc')->paginate(3);
            return view('admin.candidate.index', compact('candidates','toSearch', 'status', 'posts'));
        }
    

    public function createView()
    {
        $posts = Post::all();
        return view('admin.candidate.create', compact('posts'));

    }

    public function create(Request $req)
    {
        $validatedData = $req->validate([
            'nepali_name' => ['min:5', 'max:40'],
            'english_name' => ['min:5', 'max:40'],
        ]);
        // $candidate = $req->image;

        // return response()->json(['status'=>$candidate, 'msg'=>'Image has been cropped successfully.']);
        if ($req->ajax()) {
            $candidate['post_id'] = $req->postname;
            $candidate['nepali_name'] = $req->nepaliname;
            $candidate['english_name'] = $req->englishname;

            $image_data = $req->image;
            $image_array_1 = explode(";", $image_data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $candidate['image'] = $image_array_2[1];

        }

        Candidate::create($candidate);
        // return redirect()->route('admin.candidateindex');

        return response()->json(['status' => 1, 'msg' => 'Image has been cropped successfully.']);
        // $data = $req->input('nepaliname');
        // $req->session()->flash('name',$data);
    }

    public function delete($id)
    {
        $candidate = Candidate::find($id);
        $image = public_path() . '/uploads/' . $candidate->candidate_id . '.png';
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
        return view('admin.candidate.edit', compact('candidate', 'posts'));
    }

    public function edit(Request $req, $id)
    {
        $candidate = Candidate::find($id);
        $postid = Post::find($req->input('postname'))->id;

        if ($req->ajax()) {
            $candidate->post_id = $req->postname;
            $candidate->nepali_name = $req->nepaliname;
            $candidate->english_name = $req->englishname;

            $image_data = $req->image;
            $image_array_1 = explode(";", $image_data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $candidate->image = $image_array_2[1];

        }
        $candidate->save();
        return response()->json(['status' => 1, 'msg' => 'Image has been cropped successfully.']);
        // $data = $req->input('name');
        // $req->session()->flash('edited',$data);
        // return redirect(route('admin.candidate.index'));

    }

    public function export(Request $req)
    {
        $fileName = 'candidates.txt';
        $candidates = Candidate::all();
        $candidatedata = DB::table('posts')->selectRaw('count(candidates.id) as candidate_count, posts.max_count, posts.id')->leftjoin('candidates', 'candidates.post_id', '=', 'posts.id')->groupBy('post_id')->get();
        // dd($candidatedata);
        $post = Post::pluck('max_count', 'id');
        //  dd($post);

        $count = 0;
        foreach ($candidatedata as $candidatedatum) {
            if ($candidatedatum->candidate_count >= $candidatedatum->max_count) {
                $count++;
                if ($count == sizeof($candidatedata)) {
                    $headers = array(
                        "Content-Encoding" => "UTF-8",
                        "Content-type" => "text/txt; charset=UTF-8",
                        "Content-Disposition" => "attachment;filename=$fileName",
                        "Pragma" => "no-cache",
                        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                        "Expires" => "0",
                    );
                    $columns = array('Candidate ID', 'Post Name', 'Nepali Name', 'English Name');
                    $callback = function () use ($candidates, $columns) {
                        $file = fopen('php://output', 'w');
                        // fputcsv($file, $columns);
                        foreach ($candidates as $key => $candidate) {
                            // $row['Candidate ID']  = $candidate->candidate_id;
                            // $row['Post Name']    = $candidate->getPosts->post_name;
                            // $row['Nepali Name']    =$candidate->nepali_name;
                            // $row['English Name']  = $candidate->english_name;

                            $array = str_replace('"', '', $candidate);
                            fputs($file, implode(',', array($candidate->candidate_id . "\t" . $candidate->getPosts->post_name . "\t" . $candidate->nepali_name . "\t" . $candidate->english_name)) . "\n");

                            // fputcsv($file, array($row['Candidate ID'].'  '.$row['Post Name'].'  '.$row['Nepali Name'].'  '.$row['English Name']));
                        }

                        fclose($file);
                    };
                    return response()->stream($callback, 200, $headers);
                }

            } else {
// dd($candidatedatum->id);
                $postname = Post::find($candidatedatum->id)->post_name;
                // dd($postname);
                $req->session()->flash('wrong', $postname);
                return redirect()->back();
            }
        }
    }

    public function exportPhoto(Request $req)
    {
        $getcandidates = Candidate::all();

        File::deleteDirectory(public_path('uploads'));
        File::makeDirectory(public_path('uploads'));

        foreach ($getcandidates as $getcandidate) {

            $imageName = $getcandidate->candidate_id . '.png';
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
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === true) {
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
        // $getallcandidates= Candidate::all()->;
        $getallcandidates = Candidate::with('getPosts')->get();
        $cand = $getallcandidates->groupBy('post_id');
        foreach ($cand as $key => $getcandidate) {
            //  dd($getcandidate[0]);
            $countofcandidate = $getcandidate->count();
            for ($i = 0; $i < $countofcandidate; $i++) {

                $postid = sprintf('%02s', $getcandidate[$i]->getPosts->position_id);
                $canid = sprintf('%03s', $i + 1);
                $candidate_id = $postid . $canid;
                Candidate::whereId($getcandidate[$i]->id)->update(['candidate_id' => $candidate_id]);

            }
        }
        return redirect(route('admin.candidateindex'));

    }

    public function reset(Request $req)
    {
        $candidates = Candidate::all();
        foreach ($candidates as $candidate) {
            $destinationPath = public_path() . '/uploads/' . $candidate->candidate_id . '.png';
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
    public function filterbybothpostname(Request $req)
    {
        
        $posts = Post::all();
        $allcandidates = Candidate::all();
        $status = false;
        foreach ($allcandidates as $candidate) {
            $sizecandidate = $candidate->candidate_id;
            if ($sizecandidate) {
                $status = true;
            } else {
                $status = false;
            }
        }
        $toSearch = $req->searchresult;
        if($toSearch == 'all'){
            $postwise = Candidate::orderBy('created_at', 'desc')->paginate(3);
            return view('admin.candidate.index', compact('postwise', 'status', 'posts', 'toSearch'));
        }else{
            $postwise = Candidate::where('post_id', $toSearch)->paginate(3);
            return view('admin.candidate.index', compact('postwise', 'status', 'posts', 'toSearch'));
        }
        
    }

}
