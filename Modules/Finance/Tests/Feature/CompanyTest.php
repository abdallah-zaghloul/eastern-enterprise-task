<?php

namespace Modules\Finance\Tests\Feature;

use Modules\Finance\Database\Seeders\CompanySeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_company(): void
    {
        $this->app->make(CompanySeeder::class)->run();
        $response = $this->get(route('companies'));
        $response->assertStatus(200);
    }
}
