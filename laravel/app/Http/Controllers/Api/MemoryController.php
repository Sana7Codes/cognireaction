<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemoryTrialRequest;
use App\Models\ExperimentSession;
use App\Models\MemoryTrial;

class MemoryController extends Controller
{
    public function store(StoreMemoryTrialRequest $req, ExperimentSession $session)
    {
        $data = $req->validated();
        $data['experiment_session_id'] = $session->id;
        $trial = MemoryTrial::create($data);
        return response()->json($trial, 201);
    }
}

