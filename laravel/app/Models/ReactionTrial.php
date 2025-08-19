<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReactionTrial extends Model
{
    protected $table = 'reaction_trials';
    protected $fillable = ['experiment_session_id','stimulus_ms','response_ms','latency_ms','correct','meta'];
    protected $casts = ['meta'=>'array','correct'=>'boolean'];


    public function session(){return $this->belongsTo(ExperimentSession::class, 'experiment_session_id');}
}
