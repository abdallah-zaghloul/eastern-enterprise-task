<?php

namespace Modules\Finance\Tests\Unit;

use Modules\Finance\Database\factories\CompanyFactory;
use Modules\Finance\Database\Seeders\CompanySeeder;
use Modules\Finance\Http\Requests\StoreCompanyRequest;
use Modules\Finance\Services\CompanyService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FetchCompaniesTest extends TestCase
{
    use RefreshDatabase;


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_fetch_companies()
    {
        $this->app->make(CompanySeeder::class)->run();
        $companies = $this->app->make(CompanyService::class)->fetch();
        $this->assertNotEmpty($companies);
    }
}
