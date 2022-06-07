<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    public function home(){
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
