<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demande
{
    use HasFactory;
    protected array $fillable = [
        'id',
        'titre',
        'description',
        'statut'
    ];
}
