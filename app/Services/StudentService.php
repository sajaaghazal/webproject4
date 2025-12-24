<?php

namespace App\Services;

use App\Models\Student;
use App\DTOs\StudentDTO;
use Illuminate\Support\Facades\Hash;

class StudentService
{
    /**
     * Read: Page listing all students [cite: 23]
     * Fulfills W10 & W11 [cite: 85, 86]
     */
    public function getAllStudents()
    {
        return Student::all();
    }

    /**
     * Create: Logic to add a new student [cite: 22]
     * Uses DTO to pass structured data 
     */
    public function createStudent(StudentDTO $dto): void
    {
        Student::create([
            'stNo'     => $dto->stNo,
            'name'     => $dto->name,
            'email'    => $dto->email,
            'password' => Hash::make($dto->password), // Encrypting for security
            'avg'      => $dto->avg,
            'status'   => $dto->status,
        ]);
    }

    /**
     * Find a student by ID for Show/Edit tasks [cite: 24]
     */
    public function findStudent(int $id): Student
    {
        return Student::findOrFail($id);
    }

    /**
     * Update: Logic to edit student details [cite: 24]
     */
    public function updateStudent(Student $student, StudentDTO $dto): void
    {
        $data = [
            'stNo'   => $dto->stNo,
            'name'   => $dto->name,
            'email'  => $dto->email,
            'avg'    => $dto->avg,
            'status' => $dto->status,
        ];

        // Only update password if a new one is provided
        if ($dto->password) {
            $data['password'] = Hash::make($dto->password);
        }

        $student->update($data);
    }

    /**
     * Delete: Remove a student from the system [cite: 25]
     */
    public function deleteStudent(int $id): void
    {
        Student::destroy($id);
    }
}