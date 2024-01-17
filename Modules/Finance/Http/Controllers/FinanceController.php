<?php

namespace Modules\Finance\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        return view('finance::index');
    }

}
