<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $question_id
 * @property string $option
 * @property-read Question $question
 *
 * @method static \Database\Factories\QuestionOptionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionOption query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionOption whereOption($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionOption whereQuestionId($value)
 *
 * @mixin \Eloquent
 */
class QuestionOption extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['question_id', 'option'];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
