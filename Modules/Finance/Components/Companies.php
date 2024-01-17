<?php

namespace Modules\Finance\Components;

use Livewire\Component;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\WithPagination;
use Modules\Finance\Services\CompanyService;
use Prettus\Repository\Exceptions\RepositoryException;

class Companies extends Component
{
    use WithPagination;
    private CompanyService $companyService;

    public function __construct()
    {
        $this->companyService = app(CompanyService::class);
    }

    public function render(): Renderable
    {
        return view('finance::companies', [
            'companies' => $this->companyService->fetch()
        ]);
    }

    //livewire constructor
    public function mount()
    {

    }


}
