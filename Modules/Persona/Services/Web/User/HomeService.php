<?php

namespace Modules\Persona\Services\Web\User;

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
        return view('persona::user.home');
    }
}
