<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Adaptacao;
use App\Models\Deficiencia;
use App\Models\Especie;
use App\Models\Pelagem;
use App\Models\Temperamento;

class Animal extends Model
{
    use HasFactory;

    public function adaptacao(){
        return $this->belongsTo(Adaptacao::class);
    }
    public function deficiencia(){
        return $this->belongsTo(Deficiencia::class);
    }
    public function especie(){
        return $this->belongsTo(Especie::class);
    }
    public function pelagem(){
        return $this->belongsTo(Pelagem::class);
    }
    public function temperamento(){
        return $this->belongsTo(Temperamento::class);
    }
}
