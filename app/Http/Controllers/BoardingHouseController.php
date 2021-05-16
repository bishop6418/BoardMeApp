<?php

namespace App\Http\Controllers;

use App\Models\BoardingHouse;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{
    public function boardingHouseData($boardingHouse, $request)
    {
        $boardingHouse->name = $request->name;
        if($request->image){
            $boardingHouse->image = $request->image;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boardingHouse = BoardingHouse::all();
        return $boardingHouse;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $boardingHouse = new BoardingHouse();
        $request->image =  uploadPhotos($request->image, 'user_images/');
        $this->boardingHouseData($boardingHouse, $request);
        $boardingHouse->save();

        return $boardingHouse;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoardingHouse  $boardingHouse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $boardingHouse = BoardingHouse::with('users')->findOrFail($id);
        return $boardingHouse;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BoardingHouse  $boardingHouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->image =  uploadPhotos($request->image, 'user_images/');

        $boardingHouse = BoardingHouse::findOrFail($id);
        $this->boardingHouseData($boardingHouse, $request);
        $boardingHouse->save();

        return $boardingHouse;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoardingHouse  $boardingHouse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BoardingHouse::findOrFail($id)->delete();
        return 'success';
    }
}
