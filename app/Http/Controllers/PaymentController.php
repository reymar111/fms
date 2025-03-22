<?php

namespace App\Http\Controllers;

use App\Models\BurialPlot;
use Inertia\Inertia;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with(['client', 'deceased', 'burial_plot', 'payments'])
                    ->withSum('payments as total_payments', 'amount')
                    ->orderBy('created_at', 'desc')
                    ->whereIn('status', ['Confirmed', 'Completed'])
                    ->get();

        return Inertia::render('Payment',
        [
            'reservations' => $reservations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reservation_id' => ['required', 'exists:reservations,id'],
            'amount' => ['required', 'numeric', 'min:0'],
        ]);

        $payment = new Payment();
        $payment->reservation_id = $request->reservation_id;
        $payment->amount = $request->amount;
        $payment->save();

        // Fetch reservation details
        $reservation = Reservation::findOrFail($request->reservation_id);

        // Calculate total amount paid for this reservation
        $totalPaid = Payment::where('reservation_id', $request->reservation_id)->sum('amount');

        // Check if total and paid amounts are zero
        if ($reservation->total_amount - $totalPaid <= 0) {
            // update the reservation status
            $reservation->status = 'Completed';
            $reservation->update();

            // update the burial plot status
            $bplot = BurialPlot::find($reservation->burial_plot_id);
            $bplot->status = 'Occupied';
            $bplot->update();
        }

        // check if total and paid is 0


        return to_route('payment.index');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'reservation_id' => ['required'],
            'amount' => ['required'],
        ]);

        $payment->reservation_id = $request->reservation_id;
        $payment->amount = $request->amount;
        $payment->update();

        return to_route('payment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return to_route('payment.index');
    }
}
