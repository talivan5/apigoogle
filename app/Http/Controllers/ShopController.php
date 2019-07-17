<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops=Shop::orderBy('id', 'DESC')->get();
        
        return response()->json($shops);
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
    public function store(Request $request)
    {
        $data = (object) $request->all();

        $shop = new Shop();

        $shop->name        = $request->name;
        $shop->descripcion = $request->descripcion;
        $shop->address     = $request->address;
        $shop->city        = $request->city;
        $shop->lat         = $request->lat;
        $shop->lng         = $request->lng;
              
        if($shop->save()){
            return response()->json([
                'status'   => true,
                'response' => [
                    'id' => $shop->id
                ]
            ]);
        }
        return response()->json([
            'status' => false,
            'slug' => 'DATA_CANNOT_BE_SAVED'
        ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //crear
        try {
            $shop = Shop::findOrFail($id);

            return response()->json([
                'status' => true,
                'response' => [
                    'data' => $shop
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'slug' => 'NOT_FOUND'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shops=Shop::findOrFail($id);
        return $shops;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $shop = Shop::findOrFail($id);

        } catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                'slug' => 'NOT_FOUND'
            ], 404);
        }

        $shop->name        = $request->name;
        $shop->descripcion = $request->descripcion;
        $shop->address     = $request->address;
        $shop->city        = $request->city;
        $shop->lat         = $request->lat;
        $shop->lng         = $request->lng;

        if($shop->save()){
            return response()->json([
                'status' => true,
                'response' =>[
                    'id' => $shop->id
                ]
            ]);
        }
        return response()->json([
            'status' => false,
            'slug' => 'DATA_CANNOT_BE_UPDATED'
        ], 500);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $shop = Shop::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'slug' => 'NOT_FOUND'
            ], 404);
        }

        if($shop->delete()){
            return response()->json([
                'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false,
                'slug' => 'DATA_CANNOT_BE_DELETE'
            ]);
        }

    }
    public function listar(){
        return view('home');
    }
}
