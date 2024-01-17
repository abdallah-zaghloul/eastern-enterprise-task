<?php

namespace Modules\Finance\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Finance\Models\Company;

/**
 * Class CompanyTransformer.
 *
 * @package namespace Modules\Finance\Transformers;
 */
class CompanyTransformer extends TransformerAbstract
{
    /**
     * Transform the Company entity.
     *
     * @param Company $model
     *
     * @return array
     */
    public function transform(Company $model): array
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
