<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $events = Event::all();
        
        return view('admin.events.index', [
            'events' => $events
        ]);

    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.events.create', [
            'categories' => $categories
        ]);

    }

    public function save(Request $request)
    {
        //dd($request->img_banner);

        if($request->hasFile('img_banner')){
            $file = $request->file('img_banner');
            $img_name = time().'_event.'.$file->getClientOriginalExtension();
            $destinationPath = 'images/uploads/events';
            $uploadSuccess = $file->move($destinationPath, $img_name);
        }

        Event::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'img_banner' => $img_name,
            'date_event' => $request->date_event,
            'place_event' => $request->place_event,
            'description' => $request->description,
        ]);

        return redirect()->route('events.index');

    }
}
