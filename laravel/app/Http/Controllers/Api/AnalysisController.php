<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnalysisController extends Controller
{
    public function analyze(Request $req)
    {
        $payload = $req->validate(['text' => ['required','string','max:10000']]);
        $base = config('services.python.base_url');

        $resp = Http::timeout(5)->post($base.'/analyze', $payload);

        if ($resp->failed()) {
            return response()->json([
                'error' => 'analysis_failed',
                'status' => $resp->status(),
                'body'   => $resp->json(),
            ], 502);
        }
        return response()->json($resp->json(), 200);
    }
}
