<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        //dd ($categories);

        // eventos -> una categoria
        // categoria -> muchos eventos

        return view('events', ['categories' => $categories]);
    }
}
