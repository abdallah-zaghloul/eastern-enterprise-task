<?php

namespace Modules\Finance\Services;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Modules\Finance\Http\Requests\StoreCompanyRequest;
use Modules\Finance\Repositories\CompanyRepository;

class CompanyService
{
    public function __construct(
        private readonly CompanyRepository $companyRepository
    )
    {
    }

    public function fetch(): CursorPaginator|LengthAwarePaginator|Paginator
    {
        return $this->companyRepository
            ->latest()
            ->cursorPaginate(request()->getPaginationCount())
            ->appends(request()->query());
    }
}
