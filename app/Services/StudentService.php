<?php

namespace App\Services;

use App\Models\Student;
use App\DTOs\StudentDTO;

class StudentService
{
    public function getAll()
    {
        return Student::all();
    }

    public function store(StudentDTO $dto): void
    {
        Student::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'department_id' => $dto->department_id,
        ]);
    }

    public function find(int $id): Student
    {
        return Student::findOrFail($id);
    }

    public function update(StudentDTO $dto): void
    {
        $student = Student::findOrFail($dto->id);

        $student->update([
            'name' => $dto->name,
            'email' => $dto->email,
            'department_id' => $dto->department_id,
        ]);
    }

    public function delete(int $id): void
    {
        Student::destroy($id);
    }
}
