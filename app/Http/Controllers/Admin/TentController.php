<?php

namespace App\Http\Controllers\Admin;

use App\Tent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tents = Tent::all();

        return view('admin.rent.tent.index', compact('tents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rent.tent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'Working on.............';
        // return $request->all();

        $tent = new Tent();
        $tent->fname = $request->tent['fname'];
        $tent->lname = $request->tent['lname'];
        $tent->address = $request->tent['address'];
        $tent->contact = $request->tent['contact'];

        // $tent->cinc = $request->tent['cinc'];
        
        return $tent;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tent  $tent
     * @return \Illuminate\Http\Response
     */
    public function show(Tent $tent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tent  $tent
     * @return \Illuminate\Http\Response
     */
    public function edit(Tent $tent)
    {
        return view('admin.rent.tent.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tent  $tent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tent $tent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tent  $tent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tent $tent)
    {
        //
    }
}
