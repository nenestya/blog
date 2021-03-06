<?php

namespace App\Http\Controllers;
use Auth;
use App\Post;
use App\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $komentars=Komentar::all();
       $posts=Post::all();
       $posts = Post::orderBy('created_at', 'DESC')->get();
       $data = array(
           'posts'=>$posts,
       );
        return view('front.viewpost',compact('komentars'))->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.viewpost');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $post = new post();
            $post->user = Auth::user()->name;
            $post->post = $request->get('post');
            $post->created_at = now();
	    	$post->updated_at = now();
            $post->save();
            
            /*$input = $request->all();
            Post::create($input);*/
            Session::flash('create_post_success','Status Berhasil Ditambahkan');
            return redirect()->route('post.index');
          }
          catch (Exception $e) {
            Session::flash('create_post_fail','Gagal');
            return redirect()->route('post.index');
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $komentars=Komentar::all();
      
        $ubah=Post::FindOrFail($id);
        $ubah->update($input);
        $posts=Post::all();
        return view('front.viewpost', compact('komentars','posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('home');
        }catch (Exception $e) {
            
        }
        // $post->delete();
  
        // return redirect()->route('backend.lihatprojek')
        //                 ->with('success','project deleted successfully');
    }
}
