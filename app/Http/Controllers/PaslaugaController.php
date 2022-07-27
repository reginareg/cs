<?php

namespace App\Http\Controllers;

use App\Models\Paslauga as P;
use App\Models\Mechanikas as M;
use App\Models\Autoservisas as A;
use Illuminate\Http\Request;

class PaslaugaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paslauga = match ($request->sort)
        {
            'asc' => P::orderBy('name', 'asc')->get(),
            'desc' => P::orderBy('name', 'desc')->get(),
            default => P::all()
        };
        return view('paslauga.index', ['paslaugas'=> $paslauga]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paslauga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paslauga = new P;
        $paslauga -> name = $request->name;
        $paslauga -> deadline = $request->deadline;
        $paslauga -> price = $request->price_id;
        $paslauga->save();
        return redirect()->route('pc_index')->with('success', 'Paslauga sukurta!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paslauga  $paslauga
     * @return \Illuminate\Http\Response
     */
    public function show(Paslauga $paslauga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paslauga  $paslauga
     * @return \Illuminate\Http\Response
     */
    public function edit(Paslauga $paslauga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaslaugaRequest  $request
     * @param  \App\Models\Paslauga  $paslauga
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaslaugaRequest $request, Paslauga $paslauga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paslauga  $paslauga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paslauga $paslauga)
    {
        //
    }
}
