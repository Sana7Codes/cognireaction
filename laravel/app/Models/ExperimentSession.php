<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperimentSession extends Model
{
    protected $table = 'experiment_sessions';
    protected $fillable = ['user_id','label','meta'];
    protected $casts= ['meta'=>'array'];


    public function user() {return $this->belongsTo(User::class); }
    public function reactionTrials() {return $this->hasMany(ReactionTrial::class,'experiment_session_id');}
    public function memoryTrials(){return $this->hasMany(MemoryTrial::class, 'experiment_session_id');}
}
