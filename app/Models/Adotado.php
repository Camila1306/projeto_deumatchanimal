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
}
