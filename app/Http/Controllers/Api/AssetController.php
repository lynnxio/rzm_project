<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Asset[]|Collection
     */
    public function index(): Collection|array
    {
        return Asset::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request): mixed
    {
        return Asset::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return mixed
     */
    public function show(int $id): mixed
    {
        return Asset::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        $asset = Asset::findOrFail($id);
        $asset->update($request->all());
        return $asset;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        Asset::findOrFail($id)->delete();
    }
}
