<?php

namespace App\Services\IP\Firewall;

use App\Models\RouterosAPI;
use GuzzleHttp\Exception\ClientException;

class RulesService
{
    protected $API;

    public function __construct()
    {
        $ip = session('ip');
        $user = session('user');
        $password = session('password');

        $this->API = new RouterosAPI();
        $this->API->debug = false;
        $this->API->connect($ip, $user, $password);
    }

    public function getFirewallRules()
    {
        try {
            $rules = $this->API->comm('/ip/firewall/filter/getall');
            return $rules;
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}

