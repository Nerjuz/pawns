<?php

namespace App\Repositories;

use App\Models\Question;

class QuestionRepository
{
    protected $model;

    public function __construct(Question $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->with('options')->get();
    }
}
