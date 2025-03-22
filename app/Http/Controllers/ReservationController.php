<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Client;
use App\Models\Deceased;
use App\Models\BurialPlot;
use App\Models\Reservation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with(['client', 'deceased', 'burial_plot', 'payments'])->orderBy('created_at', 'desc')->get();
        $clients = Client::all();
        $deceaseds = Deceased::all();
        $burial_plots = BurialPlot::whereIn('status', ['Available', 'Reserved'])->get();

        return Inertia::render('Reservation',
        [
            'reservations' => $reservations,
            'clients' => $clients,
            'deceaseds' => $deceaseds,
            'burial_plots' => $burial_plots,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => ['required'],
            'deceased_id' => ['required'],
            'burial_plot_id' => ['required'],
            'mode_of_payment' => ['required'],
        ]);

        // get total amount
        $burialPlot = BurialPlot::find($request->burial_plot_id);

        $reservation = new Reservation();
        $reservation->code = Str::random(6);
        $reservation->client_id = $request->client_id;
        $reservation->deceased_id = $request->deceased_id;
        $reservation->burial_plot_id = $request->burial_plot_id;
        $reservation->status = 'Pending';
        $reservation->mode_of_payment = $request->mode_of_payment;
        $reservation->total_amount = $burialPlot->burial_type->price;
        $reservation->save();

        return to_route('reservation.index');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'client_id' => ['required'],
            'deceased_id' => ['required'],
            'burial_plot_id' => ['required'],
            'mode_of_payment' => ['required'],
        ]);

                // get total amount
                $burialPlot = BurialPlot::find($request->burial_plot_id);

        $reservation->client_id = $request->client_id;
        $reservation->deceased_id = $request->deceased_id;
        $reservation->burial_plot_id = $request->burial_plot_id;
        $reservation->mode_of_payment = $request->mode_of_payment;
        $reservation->total_amount = $burialPlot->burial_type->price;
        $reservation->update();

        return to_route('reservation.index');
    }

    public function updateStatus(Request $request, Reservation $reservation)
    {

        if($request->status === 'Canceled') {
            // make the burial plot available
            $plot = BurialPlot::find($reservation->burial_plot_id);
            $plot->status = 'Available';
            $plot->update();
        }

        if($request->status === 'Confirmed') {
            // make the burial plot available
            $plot = BurialPlot::find($reservation->burial_plot_id);
            $plot->status = 'Reserved';
            $plot->update();
        }


        $reservation->status = $request->status;
        $reservation->update();

        return to_route('reservation.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Reservation $reservation)
    {
        $reservation->delete();

        return to_route('reservation.index');
    }
}
