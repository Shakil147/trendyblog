<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function CommentsManage(){
        $Comments = Comment::orderBy('id', 'desc')->paginate(20);
        return view('admin.comments.comments-manage',['Comments'=>$Comments]);
    }

    public function CommentsDelete($id)
    {
        $Comments = Comment::find($id);
        $Comments->delete();

        return redirect('/commants-manage')->with('message', 'Comment info delete successfully');
    }

    public function unpublishedCommentInfo($id) {
        $CommentsById = Comment::find($id);
        $CommentsById->publication_status = 0;
        $CommentsById->save();

        return redirect('/commants-manage')->with('message', 'Comment info unpublished successfully');
    }

    public function publishedCommentInfo($id) {
        $CommentsById = Comment::find($id);
        $CommentsById->publication_status = 1;
        $CommentsById->save();

        return redirect('/commants-manage')->with('message', 'Comment info published successfully');
    }
}
