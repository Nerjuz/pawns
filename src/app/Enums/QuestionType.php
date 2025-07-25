<?php

namespace App\Enums;

enum QuestionType: string
{
    case Text = 'text';
    case Option = 'option';
    case MultiOption = 'multi_option';
    case Date = 'date';
    case DateTime = 'date_time';
}
