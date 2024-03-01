<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\category\PutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\category\StoreRequest;
use App\Models\category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $categories=category::paginate(10 );
        return view("dashboard.category.index",compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $category=new category();
       return view('dashboard.category.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {


        category::create($request->validated());

        return to_route("category.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
        return view("dashboard.category.show",compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
        $categories=Category::pluck('id','title');

        return view('dashboard.category.edit',compact('categories','category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, category $category)
    {

        $data=$request->validated();
        $category->update($data);
       // $request->session()->flash('status',"Registro actualizado");
        return to_route("category.index")->with('status',"Registro Actualizado");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        //
        $category->delete();
        return to_route("category.index")->with('status',"Registro Eliminado");
    }
}
