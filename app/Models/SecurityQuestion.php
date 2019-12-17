<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecurityQuestion extends Model
{
    protected $table = 'security_question';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'question_name'];
}
