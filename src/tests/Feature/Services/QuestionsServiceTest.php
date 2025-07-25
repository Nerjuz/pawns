<?php

namespace Feature\Services;

use App\Enums\QuestionType;
use App\Models\Question;
use App\Repositories\QuestionRepository;
use App\Services\QuestionsService;
use Database\Seeders\QuestionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionsServiceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(QuestionsSeeder::class);
    }

    public function test_get_all_questions_from_service(): void
    {
        $service = $this->getQuestionsService();

        $questions = $service->getQuestions();

        $this->assertCount(2, $questions);
    }

    public function test_get_question_with_options(): void
    {
        $service = $this->getQuestionsService();

        $questions = $service->getQuestions();

        /** @var Question $question */
        foreach ($questions as $question) {
            if ($question->type === QuestionType::Option) {
                $this->assertCount(2, $question->options);
            }
        }
    }

    private function getQuestionsService(): QuestionsService
    {
        $repository = new QuestionRepository(new Question());

        return new QuestionsService($repository);
    }
}
