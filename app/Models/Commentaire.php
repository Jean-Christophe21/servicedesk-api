<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire
{
    use HasFactory;

    protected array $fillable = [
        'id',
        'contenu',
        'employe_id',
        'demande_id',
        'modified'
    ];
}
