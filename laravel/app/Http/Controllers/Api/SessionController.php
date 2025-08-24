<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StartSessionRequest;
use App\Models\ExperimentSession;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

    public function summary(\App\Models\ExperimentSession $session)
{
    $latencies = \App\Models\ReactionTrial::where('experiment_session_id', $session->id)
        ->pluck('latency_ms')->all();

    $avgLatency = null;
    $medianLatency = null;
    if (!empty($latencies)) {
        $avgLatency = array_sum($latencies) / count($latencies);
        sort($latencies);
        $m = count($latencies);
        $medianLatency = $m % 2
            ? $latencies[(int)($m/2)]
            : ($latencies[$m/2 - 1] + $latencies[$m/2]) / 2;
    }

    $memAgg = \App\Models\MemoryTrial::where('experiment_session_id', $session->id)
        ->selectRaw('AVG(accuracy) as avg_accuracy, COUNT(*) as trials')
        ->first();

    return response()->json([
        'session_id'        => $session->id,
        'avg_latency_ms'    => isset($avgLatency) ? round($avgLatency, 1) : null,
        'median_latency_ms' => isset($medianLatency) ? round($medianLatency, 1) : null,
        'avg_accuracy'      => $memAgg ? round((float)$memAgg->avg_accuracy, 3) : null,
        'trials'            => $memAgg ? (int)$memAgg->trials : 0,
    ]);
}

    public function export(ExperimentSession $session): StreamedResponse
{
    $filename = "session_{$session->id}.csv";
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=\"$filename\"",
    ];

    return response()->stream(function () use ($session) {
        $out = fopen('php://output', 'w');
        fputcsv($out, ['type','trial_number','latency_ms','items_count','correct_count','accuracy']);

        foreach ($session->reactionTrials as $r) {
            fputcsv($out, ['reaction', null, $r->latency_ms, null, null, null]);
        }
        foreach ($session->memoryTrials as $m) {
            fputcsv($out, ['memory', $m->trial_number, null, $m->items_count, $m->correct_count, $m->accuracy]);
        }
        fclose($out);
    }, 200, $headers);
}

}
