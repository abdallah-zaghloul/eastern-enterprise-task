<?php

namespace Modules\Finance\Presenters;

use League\Fractal\TransformerAbstract;
use Modules\Finance\Transformers\CompanyTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CompanyPresenter.
 *
 * @package namespace Modules\Finance\Presenters;
 */
class CompanyPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return TransformerAbstract
     */
    public function getTransformer()
    {
        return new CompanyTransformer();
    }
}
