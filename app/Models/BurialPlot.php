<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BurialPlot extends Model
{
    protected $table = 'burial_plots';

    protected $with = ['burial_type'];

    public function burial_type()
    {

        return $this->belongsTo(BurialType::class, 'burial_type_id', 'id');

    }

    public function reservations()
    {

        return $this->hasMany(Reservation::class, 'burial_plot_id', 'id');

    }
}
