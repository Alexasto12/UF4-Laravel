<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Llibre extends Model
{
    public $casts = [
        'dataP' => 'datetime:d-m-Y',
    ];

    public function autor(): BelongsTo
    {
        return $this->belongsTo(Autor::class);
    }
    public function bibliotecas(): BelongsToMany
{
    return $this->belongsToMany(Biblioteca::class);
}
    protected $guarded = [];
}
