<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\BurialType;
use Illuminate\Http\Request;

class BurialTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $burial_types = BurialType::all();

        return Inertia::render('Settings/BurialType',
        [
            'burial_types' => $burial_types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);

        $burial_type = new BurialType();
        $burial_type->name = $request->name;
        $burial_type->price = $request->price;
        $burial_type->save();

        return to_route('burial_type.index');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BurialType $burial_type)
    {
        $request->validate([
            'name' => ['required']
        ]);

        $burial_type->name = $request->name;
        $burial_type->price = $request->price;
        $burial_type->update();

        return to_route('burial_type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BurialType $burial_type)
    {
        $burial_type->delete();

        return to_route('burial_type.index');
    }
}
