<?php

namespace Database\Seeders;

use App\Enums\QuestionType;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    public function run(): void
    {
        $this->createGenderQuestion();
        $this->createBirthdayQuestion();
    }

    private function createGenderQuestion(): void
    {
        $question = Question::factory()->create([
            'question' => 'Your gender',
            'type' => QuestionType::Option,
        ]);

        foreach (['male', 'female'] as $gender) {
            QuestionOption::factory()->create([
                'option' => 'male',
                'question_id' => $question->id,
            ]);
        }
    }

    private function createBirthdayQuestion(): void
    {
        Question::factory()->create([
            'question' => 'Birthday date',
            'type' => QuestionType::Date,
        ]);
    }
}
