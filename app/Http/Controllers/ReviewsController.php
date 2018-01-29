<?php

namespace App\Http\Controllers;
use App\Reviews;
use Mail;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{

    
    public function reviewsmanage(){
        $Review = Reviews::orderBy('id', 'desc')->paginate(15);
        return view('admin.Review.ReviewManage',[
            'Review'=>$Review
        ]);
    }
    public function reviewReply($id){
        $contacts = Reviews::find($id);
        /*return $contacts;*/
        return view('admin.email.message',['contact' =>$contacts]);
    }

    public function reviewUnpublis($id) {
        $reviewssById = Reviews::find($id);
        $reviewssById->publication_status = 0;
        $reviewssById->save();

        return redirect('/review/manage')->with('message', 'Review info unpublished successfully');
    }

    public function reviewPublish($id) {
        $reviewssById = Reviews::find($id);
        $reviewssById->publication_status = 1;
        $reviewssById->save();

        return redirect('/review/manage')->with('message', 'Review info published successfully');
    }

    public function reviewsDelet($id) {
        $ReviewsById = Reviews::find($id);
        $ReviewsById->delete();

        return redirect('/review/manage')->with('message', 'Rviews info delete successfully');
    }
}
