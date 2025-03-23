<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    public function reservations()
    {

        return $this->hasMany(Reservation::class, 'deceased_id', 'id');

    }
}
