<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;

class Deceased extends Model
{
    protected $table = 'deceaseds';

    public function reservations()
    {

        return $this->hasMany(Reservation::class, 'deceased_id', 'id');

    }

}
