<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.categories.create', [
            'categories' => $categories
        ]);

    }

    public function save(Request $request)
    {
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {   
        $category = Category::find($id);
        
        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category -> name = $request->name;
        $category -> save();

        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category -> delete();

        return redirect()->route('categories.index');
    }

}
