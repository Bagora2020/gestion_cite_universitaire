<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Probleme;
use App\Models\Pavillon;

class FicheIntervention extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function probleme()
{
    return $this->belongsTo(Probleme::class);
}

public function pavillon()
{
    return $this->belongsTo(Pavillon::class);
}

}
