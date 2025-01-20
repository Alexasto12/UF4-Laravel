<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Autor extends Model
{
    public function llibres(): HasMany
    {
        return $this->hasMany(Llibre::class);
    }
    public function nomCognoms(){
        return "{$this->nom} {$this->cognoms}";
    }
    protected $guarded = [];
}
