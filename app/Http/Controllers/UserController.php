<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *D
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $users=User::findOrFail($id);
        $posts=Post::all();
        $posts=Post::where('user', Auth::user()->name)->get();
        $data=array(
            'useraktif'=>Auth::user()->id,
            'nama'=>Auth::user()->name,
            'email'=>Auth::user()->email,
            'post'=>$posts,
        );
        return view('front.user',compact('users','posts'))->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return "oke";
    }
    public function img(Request $request,$id)
    {
        //
        $user = User::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['photo'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $user->update($input);
        $posts=Post::all();
        $data=array(
            'useraktif'=>Auth::user()->id,
            'nama'=>Auth::user()->name,
            'email'=>Auth::user()->email,
            'post'=>$posts,
            'user'=>$user,
        );
        return redirect('home');
        // ->with('success', ['your message,here']); 
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
