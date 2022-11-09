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

    public function getVisitaumAttribute(){
        $prazovisitaum = \Carbon\Carbon::create($this->datahora)->addDays(visita_um);
        $atrasado = $prazovisitaum <\Carbon\Carbon::now()?" <span class='alert alert-warning'>Visita atrasada</span>":"";
        $visitaum = $this->data_visita_um == null?"Previsto: ".$prazovisitaum->format('d/m/Y H:i:s').$atrasado:\Carbon\Carbon::create($this->data_visita_um)->format('d/m/Y H:i:s');  
        return $visitaum;
    } 
    public function getVisitadoisAttribute(){
        $prazovisitadois = \Carbon\Carbon::create($this->datahora)->addDays(visita_dois);
        $atrasado = $prazovisitadois <\Carbon\Carbon::now()?" <span class='alert alert-warning'>Visita atrasada</span>":"";
        $visitadois = $this->data_visita_dois == null?"Previsto: ".$prazovisitadois->format('d/m/Y H:i:s').$atrasado:\Carbon\Carbon::create($this->data_visita_dois)->format('d/m/Y H:i:s');  
        return $visitadois;
    } 
    public function getVisitatresAttribute(){
        $prazovisitatres = \Carbon\Carbon::create($this->datahora)->addDays(visita_tres);
        $atrasado = $prazovisitatres <\Carbon\Carbon::now()?" <span class='alert alert-warning'>Visita atrasada</span>":"";
        $visitatres = $this->data_visita_tres == null?"Previsto: ".$prazovisitatres->format('d/m/Y H:i:s').$atrasado:\Carbon\Carbon::create($this->data_visita_tres)->format('d/m/Y H:i:s');  
        return $visitatres;
    } 
}
