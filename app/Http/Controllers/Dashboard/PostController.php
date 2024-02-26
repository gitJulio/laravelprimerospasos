<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //return route("post.create");
        // return redirect("/post/create");
        //return redirect()->route("post.create");

        //return to_route("post.create");
        //
        //$posts=Post::get();
        //echo view("dashboard.post.index",["posts"=>$posts]);
        $posts=Post::paginate(10 );
        return view("dashboard.post.index",compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //$categorie=Category::get();
        $categories=Category::pluck('id','title');
        $post=new Post();
       // dd($categories);
        //dd($categories[0]->title);
       return view('dashboard.post.create',compact('categories','post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
      //  echo request("title");
       // echo $request->input("slug");
        //dd($request->all());

     //$validated=$request->validate(StoreRequest::myRules());
      //  dd($validated);

     // $validated=Validator::make($request->all(),StoreRequest::myRules());

      //dd($validated);

      //15/01/2024
      /*  $data=array_merge($request->all(),['image'=>'']);

        dd($data);

        Post::create($data);*/

        Post::create($request->validated());

        return to_route("post.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view("dashboard.post.show",compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $categories=Category::pluck('id','title');

        return view('dashboard.post.edit',compact('categories','post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        //
        $data=$request->validated();

        if(isset($data["image"]) ){

            //dd($request->validated()["image"]);
            $data["image"]=$filename=time().".".$data["image"]->extension();
            //dd($filename);
            $request->image->move(public_path("image"),$filename);
        }

        //dd($request->validated());
        $post->update($data);
       // $request->session()->flash('status',"Registro actualizado");
        return to_route("post.index")->with('status',"Registro Actualizado");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return to_route("post.index")->with('status',"Registro Eliminado");
    }
}
