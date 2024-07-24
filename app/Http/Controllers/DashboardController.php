<?php

namespace App\Http\Controllers;

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
        $data = $this->dashbaordService->getData();

        return view('dashboard', compact('data'));
    }

    public function cpu()
    {
        $cpu = $this->dashbaordService->getCpuLoad();

        return $cpu['cpu'] . '%';
    }

    public function uptime()
    {
        $uptime = $this->dashbaordService->getUptime();

        return $uptime['uptime'];
    }

    public function traficUp($interface)
    {
        $trafic = $this->dashbaordService->getTrafic($interface);

        return 'Upload : ' .$trafic['tx'];
    }
    public function traficDown($interface)
    {
        $trafic = $this->dashbaordService->getTrafic($interface);

        return 'Download : '.$trafic['rx'];
    }
}
