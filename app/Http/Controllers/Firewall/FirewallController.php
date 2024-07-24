<?php

namespace App\Http\Controllers\Firewall;

use App\Http\Controllers\Controller;
use App\Services\IP\Firewall\RulesService;
use Illuminate\Http\Request;

class FirewallController extends Controller
{
    protected $firewallRules;

    public function __construct(RulesService $firewallRules)
    {
        $this->firewallRules = $firewallRules;
    }

    public function index()
    {
        $rules = $this->firewallRules->getFirewallRules();
        return view('ip.firewall.index', compact('rules'));
    }
}
