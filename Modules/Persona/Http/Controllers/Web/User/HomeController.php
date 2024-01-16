<?php

namespace Modules\Persona\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Persona\Services\Web\User\HomeService;

/**
 *
 */
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param HomeService $service
     * @return Renderable
     */
    public function index(HomeService $service): Renderable
    {
        return $service->render();
    }
}
