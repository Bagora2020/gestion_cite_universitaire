<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FicheDIntervention;

class Probleme extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function pavillon(){
        return $this->belongsTo(Pavillon::class, 'pavillon_NomPav'); 
}

public function fichesInterventions()
{
    return $this->hasMany(FicheDIntervention::class);
}
}
