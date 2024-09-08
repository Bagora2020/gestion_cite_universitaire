<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pavillon extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function probleme(){
        return $this->hasMany(Probleme::class);
    }
}
