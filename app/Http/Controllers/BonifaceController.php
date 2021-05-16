<?php

namespace App\Http\Controllers;

use App\Models\Boniface;
use Illuminate\Http\Request;
use Laravel\Passport\HasApiTokens;


class BonifaceController extends Controller
{
    use HasApiTokens;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Boniface  $boniface
     * @return \Illuminate\Http\Response
     */
    public function show(Boniface $boniface)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Boniface  $boniface
     * @return \Illuminate\Http\Response
     */
    public function edit(Boniface $boniface)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Boniface  $boniface
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boniface $boniface)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Boniface  $boniface
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boniface $boniface)
    {
        //
    }
}
