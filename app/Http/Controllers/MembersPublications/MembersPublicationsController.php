<?php

namespace App\Http\Controllers\MembersPublications;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ChairMessage;
use App\Models\Position;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MembersPublicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $articles = Article::get();
        return view('MembersPublications/articles', compact('articles'));
    }

    public function getMatchingStaffs(Request $request) {
        if($request->ajax()) {
            $output="";
            $staffs= Staff::whereRaw('lower("full_name") LIKE ?', '%'.strtolower($request->value)."%")->get();
            if($staffs)
            {
            foreach ($staffs as $key => $staff) {
            $output.='<option value="'.$staff->full_name.'">';
            }
            // return $staffs;
            return Response($output);
            }

        }
    }

    public function addArticle(Request $request) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'contents' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // $author = Staff::whereRaw('lower(full_name) = ?', strtolower($request->author))->first();
        // if(!$author) {

        //     // return redirect()->back()->with(['error' => 'The author seems not to be the UDASA member']);
        // }
        // else {
            $article = new Article;
            $article->title = $request->input('title');
            $article->contents = $request->input('contents');
            $article->author = $request->input('author');

            if($request->hasFile('image')){
                // Get file with the extension
                $fileWithExt = $request->file('image')->getClientOriginalName();

                // Get just file name
                $fileName = pathinfo($fileWithExt, PATHINFO_FILENAME);

                // Get just Extension
                $extension = $request->file('image')->getClientOriginalExtension();

                // File to store
                $fileNameToStore = $fileName.'.'.$extension;

                // Upload image
                if(Article::where('image', 'public/storage/articleImages/'.$fileNameToStore)->exists()){
                }
                else{
                    $path = $request->file('image')->storeAs('articleImages', $fileNameToStore, 'public');
                }

                // return $fileNameToStore;
            }
            else {
                $fileNameToStore = 'noimage.jpg';
            }

            $article->image = '/storage/articleImages/'.$fileNameToStore;
            $article->save();
            return redirect()->back()->with(['info' => 'Article published successfully']);
        // }
    }

    // edit article
    public function editArticle($articleId, Request $request) {
        $request->validate([
            'title' => 'required',
            // 'author' => 'required',
            'contents' => 'required'
        ]);

        $article = Article::find($articleId);

        $article->title = $request->input('title');
        $article->contents = $request->input('contents');
        $article->save();

        return redirect()->back()->with(['info' => 'Article updated successfully']);
    }
    public function changeImage($id, Request $request) {
        $picture = Article::find($id);

        if ($request->hasFile('image')) {
            // Get file with the extension
            $fileWithExt = $request->file('image')->getClientOriginalName();

            // Get just file name
            $fileName = pathinfo($fileWithExt, PATHINFO_FILENAME);

            // Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();

            // File to store
            $fileNameToStore = $fileName.'.'.$extension;

            // Upload image
            if (Article::where('image', 'public/storage/articleImages/'.$fileNameToStore)->exists()) {
            } else {
                $location = substr($picture->image, 23);
                // return $location;
                Storage::delete('public/articleImages/'.$location);

                $path = $request->file('image')->storeAs('articleImages', $fileNameToStore, 'public');

                $picture->image = '/storage/articleImages/'.$fileNameToStore;
                $picture->save();
                return back()->with(['info' => 'Image updated successfully']);
            }

            // return $fileNameToStore;
        } else {
            return back()->with(['info' => 'Nothing changed']);
        }
    }
    // delete article
    public function deleteArticle($articleId) {
        $article = Article::find($articleId);
        if($article->image != '/storage/articleImages/noimage.jpg')
        {
            if(Article::where('id','!=', $articleId)->where('image', $article->image)->exists()){
                // Do not delete this image from the storage
            }else {
                $location = substr($article->image,23);
                Storage::delete('public/articleImages/'.$location);
            }
        }

        $article->delete();
        return redirect()->back()->with(['info' => 'Article deleted successfully']);
    }


    // message from chair

    public function message() {
        $messages = ChairMessage::join('staff', 'staff.id', '=', 'chair_messages.staff_id')
                                ->select('staff.*', 'chair_messages.*')
                                ->latest('chair_messages.created_at')->get();
        return view('MembersPublications/message_from_chair', compact('messages'));
    }


    public function addMessage(Request $request) {
        $request->validate([
            'message' => 'required'
        ]);

        $positionId = Position::where('position', 'chairperson')->first();
        if($positionId) {
            $chair = Staff::where('position_id', $positionId->id)->where('position_status', 'current')->first();
            if($chair) {
                $message = new ChairMessage;
                $message->message = $request->input('message');
                $message->staff_id = $chair->id;

                $message->save();
                return redirect()->back()->with(['info' => 'message added successfully']);
            }
            else {
                return redirect()->back()->with(['error' => 'Register the current Chairperson before adding message']);
            }
        }
        else {
            return redirect()->back()->with(['error' => 'Add Chairperson position first before adding message']);
        }
    }


    // edit message
    public function editMessage($id, Request $request) {
        $request->validate([
            'message' => 'required'
        ]);

        $message = ChairMessage::find($id);

        $message->message = $request->input('message');
        $message->save();
        return redirect()->back()->with(['info' => 'message updated successfully']);
    }

    // delete message
    public function deleteMessage($id) {
        ChairMessage::find($id)->delete();
        return redirect()->back()->with(['info' => 'message deleted successfully']);
    }
    
     public function upload(Request $request){
        $fileName=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location'=>"/../storage/$path"]); 
    }

}
