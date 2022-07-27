<?php

namespace App\Http\Controllers;

use App\Models\Autoservisas AS A;
use App\Models\Paslauga AS P;
use App\Models\Mechanikas AS M;
use Illuminate\Http\Request;



class AutoservisasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $aServices = match ($request->sort)
        {
            'asc' => A::orderBy('name', 'asc')->get(),
            'desc' => A::orderBy('name', 'desc')->get(),
            default => A::all()
        };
        return view('auto.index', ['aServices'=> $aServices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auto.create', ['paslaugos' => P::all(), 'mechanikai' => M::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aServices = new A;
        $aServices -> name = $request->name;
        $aServices -> phone = $request->phone;
        $aServices -> paslauga_id = $request->paslauga_id;
        $aServices -> mechanikas_id = $request->mechanikas_id;
        $aServices -> address = $request->address;
        $aServices->save();
        return redirect()->route('ac_index')->with('success', 'Autoservisas sukurtas!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autoservisas  $autoservisas
     * @return \Illuminate\Http\Response
     */
    public function show(int $autoservisasId)
    {
        $aServices = A::where('id', $autoservisasId)->first();
        return view('auto.show', ['aServices' => $aServices]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autoservisas  $autoservisas
     * @return \Illuminate\Http\Response
     */
    public function edit(A $aService)
    {
        
        return view('auto.edit', [
            'aService' => $aService,
            'paslaugos' => P::all(),
            'mechanikai' => M::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Autoservisas  $autoservisas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, A $aService)
    {
        $aService -> name = $request->name;
        $aService -> phone = $request->phone;
        $aService -> paslauga_id = $request->paslauga_id;
        $aService -> mechanikas_id = $request->mechanikas_id;
        $aService -> address = $request->address;
        $aService->save();
        return redirect()->route('ac_index')->with('success', 'You are the best!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autoservisas  $autoservisas
     * @return \Illuminate\Http\Response
     */
    public function destroy(A $aService)
    {
        $aService->delete();

        return redirect()->route('ac_index')->with('deleted', 'Bye bye, I kill you!');  
    }
}
