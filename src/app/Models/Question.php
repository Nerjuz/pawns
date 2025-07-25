<?php

namespace App\Models;

use App\Enums\QuestionType;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property QuestionType $type
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question query()
 *
 * @mixin \Eloquent
 */
class Question extends Model
{
    use HasFactory, HasTimestamps;

    protected $fillable = [
        'question',
        'type',
    ];

    protected $casts = [
        'type' => QuestionType::class,
    ];
}
