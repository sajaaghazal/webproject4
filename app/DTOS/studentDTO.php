<?php

namespace App\DTOs;

class StudentDTO
{
    public function __construct(
        public readonly string $stNo,
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $password,
        public readonly ?float $avg,
        public readonly string $status
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            stNo: $data['stNo'],
            name: $data['name'],
            email: $data['email'],
            password: $data['password'] ?? null,
            avg: isset($data['avg']) ? (float)$data['avg'] : null,
            status: $data['status']
        );
    }
}