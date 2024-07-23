<?php

namespace App\Http\Controllers;

use App\Helpers\RouterConnect;
use App\Models\RouterosAPI;
use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $dashbaordService;

    public function __construct(DashboardService $dashbaordService)
    {
        $this->dashbaordService = $dashbaordService;
    }
    public function index()
    {
        dd($this->dashbaordService->getSystemResource());
    }
}
