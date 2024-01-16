<?php

namespace Modules\Finance\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Modules\Finance\Criteria\RequestCriteria;
use Modules\Finance\Repositories\CompanyRepository;
use Modules\Finance\Models\Company;

/**
 * Class CompanyRepositoryEloquent.
 *
 * @package namespace Modules\Finance\Repositories;
 */
class CompanyRepositoryEloquent extends BaseRepository implements CompanyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Company::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
