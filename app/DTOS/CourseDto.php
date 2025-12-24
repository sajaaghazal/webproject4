<?php

namespace App\DTOs;

class CourseDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $symbol,
        public readonly int $unit,
        public readonly ?int $id = null
    ) {}

    public static function fromRequest($request, $id = null): self
    {
        return new self(
            name: $request->input('name'),
            symbol: $request->input('symbol'),
            unit: (int) $request->input('unit'),
            id: $id
        );
    }
}