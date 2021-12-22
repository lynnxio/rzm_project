<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $assets = Asset::all();
        return view('pages.asset.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $categories = Category::all();
        $statuses = Status::all();
        return view('pages.asset.create', compact(['categories', 'statuses']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request): void
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'max:255',
            'qty_balance' => 'required|integer|max:255',
            'category_id' => 'required|integer'
        ]);

        Asset::create($storeData);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $asset = Asset::find($id);

        return view('pages.asset.index', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        $asset = Asset::findOrFail($id);
        $categories = Category::all();
        $statuses = Status::all();
        return view('pages.asset.edit', compact(['asset', 'categories', 'statuses']));
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
            'name' => 'required|max:255',
            'image' => 'max:255',
            'qty_balance' => 'required|integer|max:255',
            'category_id' => 'required|integer'
        ]);
        Asset::whereId($id)->update($updateData);
        return redirect('/assets')->with('completed', 'Asset has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();

        return redirect('/assets')->with('completed', 'Asset has been deleted');
    }
}
