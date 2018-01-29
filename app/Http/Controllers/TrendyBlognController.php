<?php

namespace App\Http\Controllers;
use App\Blog;
use App\Category;
use App\Reviews;
use App\Comment;
use App\Contact;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Session;


class TrendyBlognController extends Controller
{
    
    public function index(){
            $blogs = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.category_name')
            ->where('blogs.publication_status', 1)
            ->orderBy('id', 'desc')->paginate(6);

            return view('frontend.home.home',['blogs'=>$blogs]);
    }

    public function showblogs($id) {

        $blogById = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.category_name')
            ->where('blogs.id',$id)
            ->first();

        $Comments = DB::table('comments')
            ->join('blogs', 'comments.blog_id', '=', 'blogs.id')
            ->select('comments.*', 'blogs.blog_title')
            ->where('comments.blog_id',$id)
            ->where('comments.publication_status', 1)
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.blog.blog', [
            'blogById'=>$blogById,
            'Comments'=>$Comments
        ]);
    }
    public function showcategory($id){
        $categoryBlogs = Blog::where('category_id', $id)
        ->where('blogs.publication_status',1)
        ->orderBy('id', 'desc')
        ->get();
        return view('frontend.category.category',['categoryBlogs'=>$categoryBlogs]);
    }

    public function contact(){
        return view('frontend.contact.contact');
    }
    public function Review(){
        $Review = Reviews::where('publication_status', 1)->orderBy('id', 'desc')->paginate(6);
        return view('frontend.Review.Review',['Review'=>$Review]);
    }

    public function BlogsNewComment($id, Request $request){

        $this->validate($request,[
            'full_name' => 'required',
            'email' => 'required',
            'comment_description' => 'required'
        ]);

        $Comments = new Comment();
        $Comments->blog_id = $request->blog_id;
        $Comments->full_name = $request->full_name;
        $Comments->email = $request->email;
        $Comments->comment_description = $request->comment_description;
        $Comments->save();

    
        return    redirect()->back();
       /* return redirect('/');*/
    }


    public function contactNew(Request $request) {
        $this->validate($request,[
            'full_name' => 'required',
            'email' => 'required',
            'massage_description' => 'required'

        ]);

        $Contacts = new Contact();
        $Contacts->full_name = $request->full_name;
        $Contacts->email = $request->email;
        $Contacts->massage_description = $request->massage_description;
        $Contacts->save();

        $data =$Contacts->toArray();
        Mail::send('mail.config_recive_message', $data, function ($message) use ($data){
        
            $message->to($data['email'], 'Shakil Mahmud');
        
            $message->subject('Confermation for reciveing message');
        });



        return redirect('/contact')->with('message', 'message recived successfully. We will contact you very soon');
    }

    public function reviewNew(Request $request) {
        $this->validate($request,[
            'full_name' => 'required',
            'email' => 'required',
            'Review_description' => 'required',

        ]);

        $Review = new Reviews();
        $Review->full_name = $request->full_name;
        $Review->email = $request->email;
        $Review->Review_description = $request->Review_description;
        $Review->save();

        $data = $Review->toArray();

        Mail::send('mail.review_thank', $data, function ($message) use ($data) {
        
            $message->to($data['email']);
            $message->subject('thank you for your valuable review');
        });


        return redirect('/review')->with('message', 'Review info save successfully');

    }



}
/* apiKey*/
/*<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=mllv84siw3jfv462of9mftzlcoecd8ad4bzmuagd0075ezcc"></script> */

/*tinymce.init({
   selector: "textarea",
   plugins: "a11ychecker, advcode, linkchecker, media mediaembed, powerpaste, tinymcespellchecker",
   toolbar: "a11ycheck, code"
});
*/