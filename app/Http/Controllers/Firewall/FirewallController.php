<?php

namespace App\Http\Controllers\Firewall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FirewallController extends Controller
{
    public function index()
    {
        return view('ip.firewall.index');
    }
}
