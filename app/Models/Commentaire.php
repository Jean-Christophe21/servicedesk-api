<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'content',
        'employe_id',
        'demande_id',
        'modified',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}
