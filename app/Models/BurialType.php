<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BurialType extends Model
{
    protected $table = 'burial_types';

    public function burial_plots()
    {

        return $this->hasMany(BurialPlot::class, 'burial_type_id', 'id');

    }
}
