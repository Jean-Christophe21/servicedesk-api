<?php

namespace App\DTO;

use App\Http\Requests\EmployeIdRequest;

class EmployeIdDTO
{
    public function __construct(
        public int $employeId,
    ) { }

    public function toArray(){
        return [
            'employe_id' => $this->employeId,
        ];
    }
    public static function fromRequest(EmployeIdRequest $request)
    {
        return new self(
            employeId: $request->validated('employe_id')
        );
    }
}
