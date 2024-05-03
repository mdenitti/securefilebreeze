<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EqualTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_checkHomeRoute(): void
    {
        $result = 2 + 6;
        $this->assertEquals(5, $result);
    }
}
