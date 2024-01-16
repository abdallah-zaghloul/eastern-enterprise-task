<?php

namespace Modules\Persona\Services\Web\Admin;

use Illuminate\Contracts\Support\Renderable;


/**
 *
 */
class HomeService
{
    /**
     * @return Renderable
     */
    public function render(): Renderable
    {
        return view('persona::admin.home');
    }
}
