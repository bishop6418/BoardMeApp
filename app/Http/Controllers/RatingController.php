<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function ratingData($rating, $request)
    {
        $rating->rating = $request->rating;
        $rating->comments = $request->comments;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rating = Rating::all();
        return $rating;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rating = new Rating();
        $this->ratingData($rating, $request);
        $rating->save();

        return response(['data' => $rating]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rating = Rating::with('users')->findOrFail($id);
        return $rating;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rating = Rating::with('users')->findOrFail($id);
        $this->ratingData($rating, $request);
        $rating->save();

        return response(['ratings' => $this->show($rating->id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();
        return 'Deleted successfully';
    }
}
