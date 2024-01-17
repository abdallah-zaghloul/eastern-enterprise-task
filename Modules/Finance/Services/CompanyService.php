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

    public function store(StoreCompanyRequest $request)
    {
        return $this->companyRepository->create($request->validated());
    }

    public function show(string $id)
    {
        $company = $this->companyRepository->find($id);

        /**
         * in case of realtime api data
         * we can use also guzzle Client and pass it to the constructor
        */
//        return Http::send(method: 'given method', url: 'given url', options: [$company->{'data'}]);
        return $company;
    }
}
