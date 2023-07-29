<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    public function test_index(): void {
        $response = $this->get('/employees');
        $response->assertStatus(200);
    }
}
