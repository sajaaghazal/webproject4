<?php

namespace App\DTOs;

class StudentDTO
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $email,
        public int $department_id
    ) {}
}
