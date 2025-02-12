<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Api\RouterosController;
use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginRouterController extends Controller
{
    protected $dashbaordService;

    public function __construct(DashboardService $dashbaordService)
    {
        $this->dashbaordService = $dashbaordService;
    }

    public function index()
    {
        return view('auth.login_router');
    }

    public function login_router(Request $request)
    {
        $request->validate([
            'ip' => 'required',
            'user' => 'required'
        ]);

        $ip = $request->post('ip');
        $user = $request->post('user');
        $password = $request->post('password');

        $data = [
            'ip' => $ip,
            'user' => $user,
            'password' => $password,
        ];

        $request->session()->put($data);
        $request->session()->put('identity', $this->dashbaordService->getSystemIdentity());
        $request->session()->put('model', $this->dashbaordService->getSystemResource());
        $request->session()->put('username', $this->dashbaordService->getSystemUser());

        return redirect()->route('dashboard');
    }
}
