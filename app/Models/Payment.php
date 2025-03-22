<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    public function reservation()
    {

        return $this->belongsTo(Reservation::class, 'reservation_id', 'id');

    }

    public function getCreatedAtAttribute($value)
    {

        return Carbon::parse($value)->format('F d, Y h:i A'); // Example: "March 18, 2025 02:30 PM"

    }
}
