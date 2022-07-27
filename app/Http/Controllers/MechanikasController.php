<?php

namespace App\Http\Controllers;

use App\Models\Mechanikas as M;
use App\Models\Paslauga as P;
use App\Models\Autoservisas as A;
use Illuminate\Http\Request;

class MechanikasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mechanikas = match ($request->sort)
        {
            'asc' => M::orderBy('name', 'asc')->get(),
            'desc' => M::orderBy('name', 'desc')->get(),
            default => M::all()
        };
        return view('mechanic.index', ['mechanics'=> $mechanikas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mechanic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mechanic = new M;
        $mechanic -> name = $request->name;
        $mechanic -> surname = $request->surname;
        $mechanic -> photo = $request->photo;
        $mechanic -> rating = $request->rating_id;
        $mechanic->save();
        return redirect()->route('mc_index')->with('success', 'Mechanikas sukurtas!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mechanikas  $mechanikas
     * @return \Illuminate\Http\Response
     */
    public function show(int $mechanikasId)
    {
        $mechanikasId= M::where('id', $mechanikasId)->first();
        return view('mechanic.show', ['mechanic' => $mechanikasId]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mechanikas  $mechanikas
     * @return \Illuminate\Http\Response
     */
    public function edit(M $mechanic)
    {
        
        return view('mechanic.edit', [
            'mechanic' => $mechanic,
            'paslaugos' => P::all(),
            'aServices' => A::all(),
            'ratings' => M::RATINGS

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Mechanikas  $mechanikas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, M $mechanic)
    {
    
            $mechanic->name = $request->name;
            $mechanic->surname = $request->surname;
            $mechanic->photo = $request->photo;
            $mechanic->rating = $request->rating;
            $mechanic->save();
            return redirect()->route('mc_index')->with('success', 'You are the best!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mechanikas  $mechanikas
     * @return \Illuminate\Http\Response
     */
    public function destroy(M $mechanic)
    {
        $mechanic->delete();

        return redirect()->route('mc_index')->with('deleted', 'Bye bye, I kill you!');  
    }
}
