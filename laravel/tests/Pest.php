<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(TestCase::class)->in("Feature", "Unit");   // Global TestCase
uses(RefreshDatabase::class)->in("Feature");    // Refresh DB for Feature tests
