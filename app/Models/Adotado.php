<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pet;
use App\Models\Adotante;
use PhpParser\Node\Stmt\Return_;

define('visita', 45);

class Adotado extends Model
{
    use HasFactory;

    public function pet() {
        return $this->belongsTo(Pet::class);
    }

    public function adotante() {
        return $this->belongsTo(Adotante::class);
    }

    public function getVisitaAttribute(){
        $prazovisita = \Carbon\Carbon::create($this->datahora)->addDays(visita);
        $atrasado = $prazovisita< \Carbon\Carbon::now()?" <span class='alert alert-warning'>Atrasado</span>": "";
        $visita = $this->datavisita == null?"Previsto: ".$prazovisita->format('d/m/Y').$atrasado:\Carbon\Carbon::create($this->datavisita)->format('d/m/Y H:i:s');
        return $visita;
    } 
}
