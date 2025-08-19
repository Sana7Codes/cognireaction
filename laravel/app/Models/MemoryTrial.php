<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemoryTrial extends Model
{
    protected $table = 'memory_trials';
    protected $fillable = [
        'experiment_session_id',
        'trial_number',
        'items_count',
        'correct_count',
        'accuracy',
        'meta',
    ];


    public function session(){return $this->belongsTo(ExperimentSession::class,'experiment_session_id');}
}
