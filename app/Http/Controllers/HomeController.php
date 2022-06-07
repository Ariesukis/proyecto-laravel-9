<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $events = Event::all();
        //dd ($categories);

        // eventos -> una categoria
        // categoria -> muchos eventos

        return view('events', [
            'categories' => $categories,
            'events' => $events
        ]);
    }
}
