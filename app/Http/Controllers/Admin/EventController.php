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
        $categories = Category::all();

        return view('admin.events.index', [
            'events' => $events,
            'categories' => $categories
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

    public function edit($id)
    {
        
        $event = Event::find($id);
        $categories = Category::all();
        
        return view('admin.events.edit', [
            'event' => $event,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        //dd($event->is_banner);
        
        if($request->hasFile('img_banner')){
            $file = $request->file('img_banner');
            $img_name = time().'_event.'.$file->getClientOriginalExtension();
            $destinationPath = 'images/uploads/events';
            $uploadSuccess = $file->move($destinationPath, $img_name);
        }

        $event -> category_id = $request->category_id;
        $event -> title = $request->title;
        $event -> img_banner = isset($img_name) ? $img_name : $event->img_banner;
        $event -> date_event = $request->date_event;
        $event -> place_event = $request->place_event;
        $event -> description = $request->description;
        $event -> is_banner = $request->is_banner;
        
        $event -> save();

        return redirect()->route('events.index');
    }

    public function delete($id)
    {
        $event = Event::find($id);
        $event -> delete();

        return redirect()->route('events.index');
    }
}
