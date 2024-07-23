<?php

namespace App\Http\Controllers;

use App\Services\MikrotikService;
use Illuminate\Http\Request;

class InterfaceController extends Controller
{
    protected $mikrotikService;

    public function __construct(MikrotikService $mikrotikService)
    {
        $this->mikrotikService = $mikrotikService;
    }

    public function index()
    {
        $interface = $this->mikrotikService->getInterfaces();
        return view('interface.index', ['interfaces' => $interface]);
    }

    public function disableInterface($interfaceId)
    {
        $result = $this->mikrotikService->disableInterface($interfaceId);
        return redirect()->route('interface.index')->with('status', $result ? 'Interface disabled successfully' : 'Error disabling interface');
    }

    public function enableInterface($interfaceId)
    {
        $result = $this->mikrotikService->enableInterface($interfaceId);
        // dd($result);
        return redirect()->route('interface.index')->with('status', $result ? 'Interface enabled successfully' : 'Error enabling interface');
    }
}
