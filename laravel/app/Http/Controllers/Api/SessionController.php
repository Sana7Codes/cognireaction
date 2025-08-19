<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StartSessionRequest;
use App\Models\ExperimentSession;

class SessionController extends Controller
{
    public function store(StartSessionRequest $req)
    {
        $session = ExperimentSession::create($req->validated());
        return response()->json($session, 201);
    }

    public function show(ExperimentSession $session)
    {
        return response()->json($session);
    }

    public function results(ExperimentSession $session)
    {
        $session->load(['reactionTrials','memoryTrials']);
        return response()->json($session);
    }
}
