<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function reservationSummary()
    {
        $data = DB::table('reservations as r')
            ->join('clients as c', 'r.client_id', '=', 'c.id')
            ->join('deceaseds as d', 'r.deceased_id', '=', 'd.id')
            ->join('burial_plots as b', 'r.burial_plot_id', '=', 'b.id')
            ->leftJoin('payments as p', 'r.id', '=', 'p.reservation_id')
            ->select(
                'r.id as reservation_id',
                'r.code as reservation_code',
                'c.full_name as client_name',
                'd.full_name as deceased_name',
                'b.plot_number as burial_plot',
                'r.status',
                'r.mode_of_payment',
                'r.total_amount',
                DB::raw('COALESCE(SUM(p.amount), 0) as total_paid'),
                DB::raw('(r.total_amount - COALESCE(SUM(p.amount), 0)) as balance_due'),
                'r.created_at as reservation_date'
            )
            ->groupBy('r.id', 'c.full_name', 'd.full_name', 'b.plot_number')
            ->get();

            return Inertia::render('Report/ReservationSummary',
            [
                'data' => $data,
            ]);
    }

    public function generatePaymentReport()
    {
        $data = DB::table('payments as p')
            ->join('reservations as r', 'p.reservation_id', '=', 'r.id')
            ->join('clients as c', 'r.client_id', '=', 'c.id')
            ->select(
                'p.id as payment_id',
                'r.code as reservation_code',
                'c.full_name as client_name',
                'p.amount as payment_amount',
                'r.total_amount',
                DB::raw('(r.total_amount - SUM(p.amount)) as remaining_balance'),
                'p.created_at as payment_date'
            )
            ->groupBy('p.id', 'r.code', 'c.full_name', 'p.amount', 'r.total_amount')
            ->get();

            return Inertia::render('Report/PaymentReport',
            [
                'data' => $data,
            ]);
    }

    public function generateAvailablePlotsReport()
    {
        $data = DB::table('burial_plots as b')
            ->join('burial_types as t', 'b.burial_type_id', '=', 't.id')
            ->select('b.plot_number', 't.name as burial_type', 'b.size', 'b.status')
            ->where('b.status', 'Available')
            ->orderBy('t.name')
            ->orderBy('b.plot_number')
            ->get();

            return Inertia::render('Report/AvailableBurialPlot',
            [
                'data' => $data,
            ]);
    }

    public function generateDeceasedBurialReport()
    {
        $data = DB::table('deceaseds as d')
            ->join('reservations as r', 'd.id', '=', 'r.deceased_id')
            ->join('burial_plots as b', 'r.burial_plot_id', '=', 'b.id')
            ->join('burial_types as t', 'b.burial_type_id', '=', 't.id')
            ->select(
                'd.id',
                'd.full_name as deceased_name',
                'd.birth_date',
                'd.death_date',
                'd.cause_of_death',
                'd.burial_date',
                'b.plot_number',
                't.name as burial_type'
            )
            ->orderBy('d.burial_date', 'DESC')
            ->get();

            return Inertia::render('Report/DeceasedBurialReport',
            [
                'data' => $data,
            ]);
    }

    public function generateRevenueReport()
    {
        $data = DB::table('payments as p')
        ->select(
            DB::raw("YEAR(p.created_at) as year"),
            DB::raw("MONTHNAME(p.created_at) as month"),
            DB::raw("MONTH(p.created_at) as month_number"),
            DB::raw('SUM(p.amount) as total_revenue')
        )
        ->groupBy('year', 'month', 'month_number')
        ->orderBy('year', 'DESC')
        ->orderBy('month_number', 'DESC') // Uses the month number for proper ordering
        ->get();

            return Inertia::render('Report/RevenueReport',
            [
                'data' => $data,
            ]);
    }

}
