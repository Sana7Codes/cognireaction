<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReactionTrialRequest;
use App\Models\ExperimentSession;
use App\Models\ReactionTrial;

class ReactionController extends Controller
{
    public function store(StoreReactionTrialRequest $req, ExperimentSession $session)
    {
        $data = $req->validated();
        $data['experiment_session_id'] = $session->id;
        if (!isset($data['latency_ms'])) {
            $data['latency_ms'] = $data['response_ms'] - $data['stimulus_ms'];
        }
        $trial = ReactionTrial::create($data);
        return response()->json($trial, 201);
    }
}

