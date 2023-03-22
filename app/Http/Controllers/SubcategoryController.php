<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use DB;
class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subcategories = SubCategory::get();
        return view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.subcategory.create');
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
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required'
        ]);
        $category = new Subcategory;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image/subcategory'), $filename);
            $category->image= $filename;
        }
        $category->name = $request->input('name');
        $category->category_id = $request->category;
        $category->save();
        return redirect()->route('subcategory.index');
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
        $category = Subcategory::find($id);

        return view('admin.subcategory.edit', compact('category'));
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
        $category = Subcategory::find($id);
        if($request->file('image')){
            $destination = 'image/category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image/category'), $filename);
            $category->image= $filename;
            }
        $category->name = $request->name;
        $category->update();
        return redirect()->route('subcategory.index', compact('category'));
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
        $category = Subcategory::find($id);
        $category->delete();

        return redirect()->route('subcategory.index');
    }
    public function getStates($id)
    {

        $subcategories = DB::table("subcategories")->where("category_id", $id)->pluck("name", "id");
       
        return json_encode($subcategories);
    }
}  
