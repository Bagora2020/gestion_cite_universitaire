<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Probleme extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function pavillon(){
        return $this->belongsTo(Pavillon::class, 'pavillon_NomPav'); 
}
}
