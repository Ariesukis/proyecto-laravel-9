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

        //definir banner principal
        $banner = Event::where('is_banner', '=', '1')->first();
        //dd ($categories);

        // eventos -> una categoria
        // categoria -> muchos eventos
        return view('events', [
            'categories' => $categories,
            'events' => $events,
            'banner' => $banner
        ]);
    }

    public function eventFilter(Request $request){
        //dd($request->category_id);

        $category_id = $request->category_id;
        $events = Event::where('category_id', '=', $category_id)->get();

        return response()->json([
            'success' => true,
            'message' => 'Eventos filtrados',
            'events' => $events
        ]);
        
    }
}
