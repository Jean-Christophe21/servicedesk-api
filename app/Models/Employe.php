<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'first_name',
        'role',
        'employe_id',
        'technicien_id',
        // 'statut'
    ];

    public function demande()
    {
        return $this->hasMany(Demande::class, 'employe_id');
    }

    public function demandesAssignees()
    {
        return $this->hasMany(Demande::class, 'technicien_id');
    }

    public function commentaire()
    {
        return $this->hasMany(Commentaire::class);
    }
}
