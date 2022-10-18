<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogDetail;
use Auth;
class BlogController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('addblog');
    }

    public function store(Request $request)
    {
       $request->validate([
            'title'=>'required',
            'description'=>'required',
            'visible_from'=>'required',
            'visible_to'=>'required',
       ]);

       $blog = new Blog;
       $blog->blog_title = $request['title'];
       $blog->user_id = Auth::user()->id;
       $blog->status = 1;
       
       if($blog->save()){
         $lastid = $blog->id;
         $details = new BlogDetail;
         $details->blog_id = $lastid;
         $details->post_text = $request['description'];
         $file= $request->file('image');
         $filename= date('YmdHi').$file->getClientOriginalName();
         $details->blog_attachment_1 = $filename;
         $details->visible_from = $request['visible_from'];
         $details->visible_to = $request['visible_to'];
         $details->status = 1;
         $details->timestamps = false;
         $details->save();
         $file-> move(public_path('public/Image'), $filename);
       }
       
       



       
    }
}
