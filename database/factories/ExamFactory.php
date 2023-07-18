<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subject_id=Subject::pluck("id")->toArray();
        return [
            'exam_name'=>Str::random(10),
            'subject_id'=>fake()->randomElement($subject_id),
            'start_time'=>fake()->dateTime(),
            'end_time'=>fake()->dateTime(),
        ];
    }
}
