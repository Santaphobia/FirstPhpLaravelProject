<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'review',
        'name',
        'email'
    ];
}
