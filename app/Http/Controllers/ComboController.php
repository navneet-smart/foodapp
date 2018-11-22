<?php

namespace App\Http\Controllers;

use App\Http\Resources\Combos\ComboResource;
use App\Model\Combo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combo = new Combo;
        $combo->combo = 'C';
        $combo->save();
        return response([
            'status'=>1,
            'message'=>'Combo ID Created Successfully!',
            'data'=> new ComboResource($combo)
        ],Response::HTTP_CREATED);
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
     * @param  \App\Model\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function show(Combo $combo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function edit(Combo $combo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Combo $combo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Combo $combo)
    {
        //
    }
}
