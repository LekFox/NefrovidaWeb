<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamizaje extends Model
{
    use HasFactory;


    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

}
