<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pet;
use App\Models\Adotante;
use PhpParser\Node\Stmt\Return_;

define('visita_um', 15);
define('visita_dois', 45);
define('visita_tres', 90);

class Adotado extends Model
{
    use HasFactory;

    public function pet() {
        return $this->belongsTo(Pet::class);
    }

    public function adotante() {
        return $this->belongsTo(Adotante::class);
    }

    public function getData_Visita_umAttribute(){
        $prazovisitaum = \Carbon\Carbon::create($this->datahora)->addDays(visita_um);
        $atrasado = $prazovisitaum <\Carbon\Carbon::now()?" <span class='alert alert-warning'>Visita atrasada</span>":"";
        $data_visita_um = $this->datavisitaum == null?"Previsto: ".$prazovisitaum->format('d/m/Y H:i:s').$atrasado:\Carbon\Carbon::create($this->datavisitaum)->format('d/m/Y H:i:s');  
        return $data_visita_um;
    } 
    public function getData_Visita_doisAttribute(){
        $prazovisitadois = \Carbon\Carbon::create($this->datahora)->addDays(visita_dois);
        $atrasado = $prazovisitadois <\Carbon\Carbon::now()?" <span class='alert alert-warning'>Visita atrasada</span>":"";
        $data_visita_dois = $this->datavisitaum == null?"Previsto: ".$prazovisitadois->format('d/m/Y H:i:s').$atrasado:\Carbon\Carbon::create($this->datavisitadois)->format('d/m/Y H:i:s');  
        return $data_visita_dois;
    } 
    public function getData_Visita_tresAttribute(){
        $prazovisitatres = \Carbon\Carbon::create($this->datahora)->addDays(visita_tres);
        $atrasado = $prazovisitatres <\Carbon\Carbon::now()?" <span class='alert alert-warning'>Visita atrasada</span>":"";
        $data_visita_tres = $this->datavisitatres == null?"Previsto: ".$prazovisitatres->format('d/m/Y H:i:s').$atrasado:\Carbon\Carbon::create($this->datavisitatres)->format('d/m/Y H:i:s');  
        return $data_visita_tres;
    } 
}
