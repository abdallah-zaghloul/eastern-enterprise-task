<?php

namespace Modules\Finance\Tests\Unit;

use Modules\Finance\Database\factories\CompanyFactory;
use Modules\Finance\Http\Requests\StoreCompanyRequest;
use Modules\Finance\Services\CompanyService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowCompanyTest extends TestCase
{
    use RefreshDatabase;


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_show_company()
    {
        $companyData = $this->app->make(CompanyFactory::class)->definition();
        $request = $this->app->make(StoreCompanyRequest::class)->merge($companyData);
        $company = $this->app->make(CompanyService::class)->store($request);
        $this->assertNotEmpty($company);
        $this->assertDatabaseHas('companies', $company->toArray());
    }
}
