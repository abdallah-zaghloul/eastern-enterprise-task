<?php

namespace Modules\Finance\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Finance\Http\Requests\StoreCompanyRequest;
use Modules\Finance\Services\CompanyService;

/**
 *
 */
class CompanyController extends Controller
{
    /**
     * @param CompanyService $companyService
     */
    public function __construct(
        private readonly CompanyService $companyService
    )
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function create(): Renderable
    {
        return view('finance::create-company');
    }


    /**
     * Display a listing of the resource.
     */
    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        $this->companyService->store($request);
        return redirect()->route('finance');
    }

}
