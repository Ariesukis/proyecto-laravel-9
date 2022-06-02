<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class EventCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        //dd ($categories);
        return view('events-categories', ['categories' => $categories]);
    }
}
