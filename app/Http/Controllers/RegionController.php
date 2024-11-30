<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();
        return view('regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('regions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kota' => 'required|string|max:255',
            'nama_daerah' => 'required|string|max:255',
        ]);

        $region = Region::create($validatedData);

        return redirect()->route('regions.index')->with('success', 'Region created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        // You can implement this if you need a "show" view
        // For simple CRUD, it's often omitted
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        return view('regions.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        $validatedData = $request->validate([
            'nama_kota' => 'required|string|max:255',
            'nama_daerah' => 'required|string|max:255',
        ]);

        $region->update($validatedData);

        return redirect()->route('regions.index')->with('success', 'Region updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->route('regions.index')->with('success', 'Region deleted successfully.');
    }
}
