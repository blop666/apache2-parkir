<?php

namespace App\Http\Controllers;

use App\Models\vehicle_type;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'vehicle_type';
        $vehicle_types = vehicle_type::all();
        return view('vehicle_type.index', compact('title', 'vehicle_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $title = 'vehicle_type';

        return view('vehicle_type.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    
        $validate = $request->validate([
            'jenis' =>'required',
            'perjam_pertama' => 'required|integer',
            'perjam_berikutnya' => 'required|integer',
            'max_perhari' => 'required|integer'
        ]);

        

        vehicle_type::create($validate);

        return redirect()->route('vehicle-type.index')->with('Success', 'Berhasil Menambah Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(vehicle_type $vehicle_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vehicle_type $vehicle_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vehicle_type $vehicle_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vehicle_type $vehicle_type)
    {
        //
    }
}
