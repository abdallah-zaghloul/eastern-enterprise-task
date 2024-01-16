<?php

namespace Modules\Finance\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Finance\Database\factories\CompanyFactory;

class CompanySeeder extends Seeder
{
    public function __construct(
        private readonly CompanyFactory $companyFactory
    )
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->companyFactory->createMany(100);
    }
}
