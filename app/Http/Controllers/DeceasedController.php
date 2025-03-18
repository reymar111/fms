<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Deceased;
use Illuminate\Http\Request;

class DeceasedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deceaseds = Deceased::all();

        return Inertia::render('Settings/Deceased',
        [
            'deceaseds' => $deceaseds,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required'],
            'death_date' => ['required'],
        ]);

        $deceased = new Deceased();
        $deceased->full_name = $request->full_name;
        $deceased->birth_date = $request->birth_date;
        $deceased->death_date = $request->death_date;
        $deceased->cause_of_death = $request->cause_of_death;
        $deceased->burial_date = $request->burial_date;
        $deceased->save();

        return to_route('deceased.index');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deceased $deceased)
    {
        $request->validate([
            'full_name' => ['required'],
            'death_date' => ['required'],
        ]);

        $deceased->full_name = $request->full_name;
        $deceased->birth_date = $request->birth_date;
        $deceased->death_date = $request->death_date;
        $deceased->cause_of_death = $request->cause_of_death;
        $deceased->burial_date = $request->burial_date;
        $deceased->update();

        return to_route('deceased.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deceased $deceased)
    {
        $deceased->delete();

        return to_route('deceased.index');
    }
}
