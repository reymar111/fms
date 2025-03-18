<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\BurialPlot;
use App\Models\BurialType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BurialPlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $burial_plots = BurialPlot::with('burial_type')->orderBy('created_at', 'desc')->get();
        $burial_types = BurialType::all();

        return Inertia::render('Settings/BurialPlot',
        [
            'burial_plots' => $burial_plots,
            'burial_types' => $burial_types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'burial_type_id' => ['required']
        ]);

        $burial_plot = new BurialPlot();
        $burial_plot->plot_number = 'PN-' . strtoupper(Str::random(6));
        $burial_plot->size = $request->size;
        $burial_plot->burial_type_id = $request->burial_type_id;
        $burial_plot->save();

        return to_route('burial_plot.index');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BurialPlot $burial_plot)
    {
        $request->validate([
            'burial_type_id' => ['required']
        ]);

        $burial_plot->size = $request->size;
        $burial_plot->burial_type_id = $request->burial_type_id;
        $burial_plot->update();

        return to_route('burial_plot.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BurialPlot $burial_plot)
    {
        $burial_plot->delete();

        return to_route('burial_plot.index');
    }
}
