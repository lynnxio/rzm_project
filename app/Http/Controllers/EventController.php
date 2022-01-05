<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Event;
use App\Models\Status;
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
    public function index(): View|Factory|Application
    {
        $events = Event::all();

        return view('pages.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $statuses = Status::all();
        $assets = Asset::all();
        return view('pages.event.create', compact('statuses', 'assets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'start_date' => 'required|max:255',
            'end_date' => 'required|max:255',
            'status_id' => 'required|integer',
            'asset_id' => 'required|integer',
            'qty' => 'required|integer'
        ]);

        $event = new Event;
        $event->start_date = date('Y-m-d', strtotime($request->start_date));
        $event->end_date = date('Y-m-d', strtotime($request->end_date));
        $event->user_id = Auth::id();
        $event->status_id = $request->status_id;
        $event->asset_id = $request->asset_id;
        $event->qty = $request->qty;
        $event->save();

        return redirect()->back()->with('success', 'Event has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id): View|Factory|Application
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
    public function edit(int $id): View|Factory|Application
    {
        $event = Event::findOrFail($id);
        $categories = Category::all();
        $statuses = Status::all();
        $assets = Asset::all();
        return view('pages.event.edit', compact(['event', 'categories', 'statuses', 'assets']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, int $id): Redirector|RedirectResponse|Application
    {

        $updateData = $request->validate([
            'start_date' => 'required|max:255',
            'end_date' => 'required|max:255',
            'status_id' => 'required|integer',
            'asset_id' => 'required|integer',
            'qty' => 'required|integer'

        ]);


        Event::whereId($id)->update($updateData);
        return redirect()->route('events.index')->with('completed', 'Event has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(int $id): Redirector|RedirectResponse|Application
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect('/events')->with('completed', 'Event has been deleted');
    }
}
