<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $events = Event::all();
        return view('pages.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $updateData = $request->validate([
            'start_date' => 'required|max:255',
            'end_date' => 'required|max:255',
            'user_id' => 'required|integer',
            'status_id' => 'required|integer',
        ]);
        $event = Event::create($updateData);
        return redirect('/event')->with('completed', 'Event has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        return view('pages.event.index', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('page.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'start_date' => 'required|max:255',
            'end_date' => 'required|max:255',
            'user_id' => 'required|integer',
            'status_id' => 'required|integer',
        ]);
        Event::whereId($id)->update($updateData);
        return redirect('/events')->with('completed', 'Event has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect('/events')->with('completed', 'Event has been deleted');
    }
}
