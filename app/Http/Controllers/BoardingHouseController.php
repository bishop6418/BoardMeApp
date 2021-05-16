<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardingHouse;
use Illuminate\Support\Facades\Auth;

class BoardingHouseController extends Controller
{
    public function boardingHouseData($boardingHouse, $request)
    {
        $boardingHouse->name = $request->name;
        $boardingHouse->status = $request->status;
        $boadringHouse->category_id = $request->category_id;

        //address
        $boadringHouse->address_address = $boadringHouse->address_address;
        $boadringHouse->address_latitude = $boadringHouse->address_latitude;
        $boadringHouse->address_longtitude = $boadringHouse->address_longtitude;

        $boadringHouse->user_id = auth()->user()->id;
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
        $this->boardingHouseData($boardingHouse, $request);
        $boardingHouse->save();

        //images
        foreach($image in $request->images)
        {
            $boarding_house_image = new BoardingHouseImages();
            $boarding_house_image->boarding_houses_id = $boardingHouse->id;
            $boarding_house_image->image =  uploadPhotos($image 'user_images/');
            $boarding_house_image->isThumbnail = $request->isThumbnail;
            $boardingHouse->save();
        }
         
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
        $boardingHouse = BoardingHouse::with('users','images')->findOrFail($id);
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
        $boardingHouse->save();

        //images
        foreach($image in $request->images)
        {
            $boarding_house_image = new BoardingHouseImages();
            $boarding_house_image->boarding_houses_id = $boardingHouse->id;
            $boarding_house_image->image =  uploadPhotos($image 'user_images/');
            $boarding_house_image->isThumbnail = $request->isThumbnail;
            $boardingHouse->save();
        }

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
