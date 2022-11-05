<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Response;

class CategoryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //newly created resource in storage
        $data = $request->validate([
            "name" => "required|max:255",
        ]);
        $category = Category::create($data);
        return Response::json($category);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete todocategory with id

        $category = Category::find($id);
        $category->delete();
        return Response::json($category);
    }
   
}
