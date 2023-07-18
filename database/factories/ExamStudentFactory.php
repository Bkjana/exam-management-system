<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExamStudent>
 */
class ExamStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $stu_id=User::where('role','student')->pluck('id')->toArray();
        $exam_id=Exam::pluck('id')->toArray();
        return [
            'student_id'=>fake()->randomElement($stu_id),
            'exam_id'=>fake()->randomElement($exam_id),
        ];
    }
}
