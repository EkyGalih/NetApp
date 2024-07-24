<?php

namespace App\Http\Controllers\Firewall;

use App\Http\Controllers\Controller;
use App\Services\IP\Firewall\RulesFirewall;
use Illuminate\Http\Request;

class RulesController extends Controller
{
    protected $firewallRules;

    public function __construct(RulesFirewall $firewallRules)
    {
        $this->firewallRules = $firewallRules;
    }

    public function index()
    {
        $rules = $this->firewallRules->getFirewallRules();
        return view('ip.firewall.index', compact('rules'));
    }
}
