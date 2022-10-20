<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner',
        'name',
        'description',
        'url',
        'is_archived',
        'is_fork',
        'visibility',
        'language',
        'default_branch',
        'last_commit',
        'number_of_commits'
    ];

    protected $table = "repositories";
}
