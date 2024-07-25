<?php

namespace App\Http\Controllers\Firewall;

use App\Http\Controllers\Controller;
use App\Services\InterfaceService;
use App\Services\IP\Firewall\RulesService;
use Illuminate\Http\Request;

class FirewallController extends Controller
{
    protected $firewallRules;
    protected $interfaces;
    public function __construct(RulesService $firewallRules, InterfaceService $interfaces)
    {
        $this->firewallRules = $firewallRules;
        $this->interfaces = $interfaces;
    }

    public function index()
    {
        $rules = $this->firewallRules->getFirewallRules();
        $interfaces = $this->interfaces->getInterfaces();

        return view('ip.firewall.index', compact('rules', 'interfaces'));
    }
}
