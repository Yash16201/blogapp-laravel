<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog;
use App\Models\BlogDetail;
use Auth;

class HomeController extends Controller
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
    public function showall()
    {

        $user = Auth::user();
        if (Gate::allows('admin_only', $user)) {
            $blogs = Blog::with('detail')->paginate(5);
            return view('adminviewblogs',compact('blogs'));
        } else {
            abort(403);
        }
        
    }
    public function index()
    {
       
        $blogs = Blog::where('user_id', '=', Auth::user()->id)->where('status','=','0')->with('detail')->paginate(5);
        
        return view('home',compact('blogs'));
    }
    public function showData(Request $request){
        
        $output = '';
        if (!empty($request->search) || !ctype_space($request->search)) {
            $blogs = Blog::where('user_id', '=', Auth::user()->id)->where('blog_title','LIKE','%'.$request->search.'%')->where('status','=','0')->with('detail')->paginate(5);
            foreach($blogs as $blog){
                $output .= '
                <tr>
                    <td width="20%">
                    <p>'.ucfirst($blog->blog_title).'</p>
                    </td>
                    <td width="50%">
                        <p>'. ucfirst($blog['detail']->post_text).' </p>
                    </td>
                    <td width="30%">
                            <a class="btn btn-success" href="" role="button">View </a>
                            <a class="btn btn-primary mx-2" href="" role="button">Edit</a> 
                            <a class="btn btn-danger" href="" role="button">Delete</a>
                    </td>
                </tr>
                ';
            }
            return $output;
        }else{
            index();
        }
        
    }
}
