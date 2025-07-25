<?php

namespace App\Services;

use App\Repositories\QuestionRepository;

class QuestionsService
{
    public function __construct(private QuestionRepository $questionRepository)
    {
    }

    public function getQuestions()
    {
        return $this->questionRepository->all();
    }
}
