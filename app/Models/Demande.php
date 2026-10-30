<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'status',
        'technicien_id',
        'employe_id',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

    public function technicien()
    {
        return $this->belongsTo(Employe::class, 'technicien_id');
    }

    public function commentaire()
    {
        return $this->hasMany(Commentaire::class);
    }
}
