<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $menuId = 1)
    {
        //
        return MenuItem::where('menu_id', $menuId)->get()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $menuId)
    {
        //
        $menuItem = new MenuItem;
        $menuItem->menu_id = $menuId;
        $menuItem->image = $request->image;
        $menuItem->image = $request->image;
        $menuItem->title = $request->title;
        $menuItem->description = $request->description;
        $menuItem->price = $request->price;
        $menuItem->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $menuId, int $id)
    {
        $menuItem = MenuItem::where('menu_id', $menuId)->where('id', $id)->first();

        if (!$menuItem) {
            abort(404);
        }

        return $menuItem;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, int $menuId, int $id)
    {   
        //
        $menuItem = MenuItem::where('menu_id', $menuId)->where('id', $id)->first();
        $menuItem->image = $request->image ?? $menuItem->image;
        $menuItem->title = $request->title ?? $menuItem->title;
        $menuItem->description = $request->description ?? $menuItem->description;
        $menuItem->price = $request->price ?? $menuItem->price;
        $menuItem->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItem $menuItem)
    {
        //
    }
}
