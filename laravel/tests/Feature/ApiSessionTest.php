<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;

it("creates a session when authenticated", function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $res = $this->postJson("/api/sessions", [
        "user_id" => $user->id,
        "label"   => "t",
        "meta"    => ["d" => "x"],
    ]);

    $res->assertCreated()
        ->assertJsonPath("user_id", $user->id);
});

it("blocks unauthenticated create", function () {
    $this->postJson("/api/sessions", ["label" => "t"])
         ->assertUnauthorized();
});
