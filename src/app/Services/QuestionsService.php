<?php

namespace App\Services;

use App\Repositories\QuestionRepository;
use Illuminate\Database\Eloquent\Collection;

class QuestionsService
{
    public function __construct(private QuestionRepository $questionRepository)
    {
    }

    public function getQuestions(): Collection
    {
        return $this->questionRepository->all();
    }
}
