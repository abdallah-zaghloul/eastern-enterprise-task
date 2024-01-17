<?php

namespace Modules\Finance\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Modules\Finance\Criteria\RequestCriteria;
use Modules\Finance\Repositories\CompanyRepository;
use Modules\Finance\Models\Company;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class CompanyRepositoryEloquent.
 *
 * @package namespace Modules\Finance\Repositories;
 */
class CompanyRepositoryEloquent extends BaseRepository implements CompanyRepository, CacheableInterface
{
    use CacheableRepository;

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
