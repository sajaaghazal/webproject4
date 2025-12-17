<?php

namespace App\DTOs;

class CourseDTO
{
    public function __construct(
        public ?int $id,
        public string $title,
        public string $course_code
    ) {}
}
