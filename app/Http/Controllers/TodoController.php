<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;
use App\Models\Category;
use Response;
use Redirect;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // todo list category wise
        if (!empty($request->category_id)) {
            $todos = Todo::where("category_id", $request->category_id)
                ->orderBy("task", "asc")
                ->get();
            $type = $request->category_id;
        } else {
            // all todolisting
            $todos = Todo::orderBy("task", "asc")->get();
            $type = 1;
        }

        //category lists
        $categories = Category::orderBy("name", "asc")->get();
        return view("todo.todo", [
            "todos" => $todos,
            "categories" => $categories,
            "type" => $type,
        ]);
    }

    public function store(Request $request)
    {
        //newly todo list created resource in storage

        $data = $request->validate([
            "task" => "required|max:255",
            "category_id" => "required",
        ]);
        $todo = Todo::create($data);
        return back()->with("message", "Todo Created Successfully");
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
        $todo = Todo::find($id);
        $todo->delete();
        return Response::json($todo);
    }
}
