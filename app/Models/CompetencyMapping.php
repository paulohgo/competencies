<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetencyMapping extends Model
{
    use HasFactory;
    protected $fillable = ['level_id', 'factor_id', 'competency_id'];
}
