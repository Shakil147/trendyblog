<?php

namespace App\Http\Controllers;
use App\Blog;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public  function showblog(){
        $PublishedCategories= Category::where('publication_status', 1)->get();
        return view('admin.blog.add-blog', [
            'PublishedCategories' => $PublishedCategories,
        ]);
    }

    protected function blogFieldValidation($request) {
        $this->validate($request, [
            'blog_title'=> 'required|alpha',
            'blog_description' => 'required',
            'blog_image' => 'required'
        ]);
    }
    public function saveBlogInfo(Request $request){
        $this->validate($request,[
            'blog_title' => 'required',
            'category_id' => 'required',
            'blog_description' => 'required',
            'publication_status' => 'required',

        ]);
        $blog_image= $request->file('blog_image');
        $imageName= $blog_image->getClientOriginalName();
        $directory = 'blogimage/';
        $blog_image->move($directory,$imageName);
        $imageUrl = $directory.$imageName;

        $Blog = new Blog();
        $Blog->blog_title = $request->blog_title;
        $Blog->category_id = $request->category_id;
        $Blog->blog_short_description = $request->blog_short_description;
        $Blog->blog_description = $request->blog_description;
        $Blog->blog_image = $imageUrl;
        $Blog->publication_status = $request->publication_status;
        $Blog->save();
        return redirect('/blog/add')->with('message', 'Blog save successfully');


        return $request->all();

    }


    public function manageBlogInfo() {
        //$allBlogs = Blog::all();

        $allBlogs= DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.category_name')
            ->get();
        return view('admin.blog.manage-blog', ['allBlogs'=>$allBlogs]);

    }
    public function saveBlogImage($request) {
        $blogImage = $request->file('blog_image');
        $imageName = $blogImage->getClientOriginalName();
        $directory = 'blog-images/';
        $blogImage->move($directory, $imageName);
        $imageUrl = $directory.$imageName;
        return $imageUrl;
    }

    public function viewBlog($id) {

        $blogById = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.category_name')
            ->where('blogs.id',$id)
            ->first();
        return view('admin.blog.view-blog', ['blogById'=>$blogById]);
    }
    public function unpublishedBlogInfo($id) {
        $blogById = Blog::find($id);
        $blogById->publication_status = 0;
        $blogById->save();

        return redirect('/blog/manage')->with('message', 'Blog info unpublished successfully');
    }
    public function publishedBlogInfo($id) {
        $blogById = Blog::find($id);
        $blogById->publication_status = 1;
        $blogById->save();

        return redirect('/blog/manage')->with('message', 'Blog info published successfully');
    }

    public function editBlogInfo($id) {
        $blogById = Blog::find($id);
        $publishedCategories = Category::where('publication_status', 1)->get();
        return view('admin.blog.edit-blog', [
            'publishedCategories'=>$publishedCategories,
            'blogById'=>$blogById
        ]);
    }

    public function updateBlogBasicInfo($blogById, $request, $imageUrl=null) {
        $blogById->blog_title = $request->blog_title;
        $blogById->category_id = $request->category_id;
        $blogById->blog_short_description = $request->blog_short_description;
        $blogById->blog_description = $request->blog_description;
        if($imageUrl) {
            $blogById->blog_image = $imageUrl;
        }
        $blogById->publication_status = $request->publication_status;
        $blogById->save();
    }

    public function updateBlogInfo(Request $request) {
        $blogImage = $request->file('blog_image');
        $blogById = Blog::find($request->blog_id);
        if($blogImage) {
            unlink($blogById->blog_image);
            $imageUrl = $this->saveBlogImage($request);
            $this->updateBlogBasicInfo($blogById, $request, $imageUrl);
        } else {
            $this->updateBlogBasicInfo($blogById, $request);
        }
        return redirect('/blog/manage')->with('message', 'Blog info update successfully');
    }

    public function deleteBlog($id) {
        $blogById = Blog::find($id);
        $blogById->delete();

        return redirect('/blog/manage')->with('message', 'Blog info delete successfully');
    }

    public function Showgallery(){
        $pic = Blog::where('publication_status', 1)->get();
        return view('admin.blog.gallery', ['pic'=>$pic]);
    }
}
