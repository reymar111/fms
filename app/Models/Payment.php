<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    public function reservation()
    {

        return $this->belongsTo(Reservation::class, 'reservation_id', 'id');

    }
}
