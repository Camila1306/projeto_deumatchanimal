<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Adotado;

class Pet extends Model
{
    use HasFactory;
    
    public function adotados() {
        return $this->hasMany(Adotado::class);
    }

}
