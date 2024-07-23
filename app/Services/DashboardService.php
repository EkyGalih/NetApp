<?php

namespace App\Services;

use App\Models\RouterosAPI;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class DashboardService
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

    public function getSystemResource()
    {
        try {
            $resource = $this->API->comm('/system/resource/print');
            return $resource;
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
