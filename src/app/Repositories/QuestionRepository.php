<?php

namespace App\Repositories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;

class QuestionRepository
{
    protected $model;

    public function __construct(Question $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->with('options')->get();
    }
}
