<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    public function client()
    {

        return $this->belongsTo(Client::class, 'client_id', 'id');

    }

    public function deceased()
    {

        return $this->belongsTo(Deceased::class, 'deceased_id', 'id');

    }

    public function burial_plot()
    {

        return $this->belongsTo(BurialPlot::class, 'burial_plot_id', 'id');

    }

    public function payments()
    {

        return $this->hasMany(Payment::class, 'reservation_id', 'id');

    }
}
