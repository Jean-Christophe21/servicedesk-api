<?php

namespace App\DTO;

use Illuminate\Http\Request;

class EmployeDTO
{
    public function __construct(
        public string $nom,
        public string $prenom,
        public string $role,
        //public string $statut,
    ) { }

    public function toArray(){
        return [
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'role' => $this->role,
        ];
    }
//    public static function fromRequest(StoreEmployeRequest $request)
//    {
//        return new self(
//            nom: $request->validated('nom')?? "",
//            prenom: $request->validated('prenom')?? "",
//            role: $request->validated('role')?? "",
//        );
//    }

}
