<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Resources\ItemResource;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $item = Item::create($request->only(['name','menu_id','item_id']));

        return new ItemResource($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  mixed  $item
     * @return \Illuminate\Http\Response
     */
    public function show($item)
    {
        $item = Item::findOrFail($item);

        return new ItemResource($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $item)
    {
        $item = Item::findOrFail($item);

        $item->update($request->only(['name','menu_id','item_id']));

        return new ItemResource($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  mixed  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($item)
    {
        $item = Item::findOrFail($item);

        try{
            $item->delete();
        }catch(\Exception $e){

        }
        return response()->json(null,204);
    }
}
