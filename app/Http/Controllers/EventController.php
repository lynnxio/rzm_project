<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $events = Event::all();
        return view('pages.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pages.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $updateData = $request->validate([
            'start_date' => 'required|max:255',
            'end_date' => 'required|max:255',
            'status_id' => 'required|integer',
            'asset_id' => 'required|integer',
            'qty' => 'required|integer'
        ]);
        $event = new Event;
        $event->start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
        $event->end_date = date('Y-m-d H:i:s', strtotime($request->end_date));
        $event->user_id = Auth::id();
        $event->status_id = $request->status_id;
        $event->asset_id = $request->asset_id;
        $event->qty = $request->qty;
        $event->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $event = Event::find($id);

        return view('pages.event.index', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
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
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'start_date' => 'required|max:255',
            'end_date' => 'required|max:255',
            'user_id' => 'required|integer',
            'status_id' => 'required|integer',
            'asset_id' => 'required|integer',
            'qty' => 'required|integer'
        ]);
        Event::whereId($id)->update($updateData);
        return redirect('/events')->with('completed', 'Event has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect('/events')->with('completed', 'Event has been deleted');
    }
}
