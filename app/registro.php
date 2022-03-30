<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
