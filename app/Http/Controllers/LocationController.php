<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Location';
        $locations = location::all();
        return view('location.index', compact('title', 'locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Location';

        return view('location.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'location_name' => 'required|string|max:255',
            'max_motorcycle' => 'required|integer',
            'max_car' => 'required|integer',
            'max_other' => 'required|integer'
        ]);

        location::create($validate);

        return redirect()->route('location.index')->with('Success', 'Berhasil Menambah Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(location $location)
    {
        //
    }
}
