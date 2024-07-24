<?php

namespace App\Services;

use App\Helpers\Helpers;
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

    public function getSystemIdentity()
    {
        try {
            $resource = $this->API->comm('/system/identity/print');
            return $resource[0]['name'];
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getSystemUser()
    {
        try {
            $resource = $this->API->comm('/user/active/print');
            return $resource[0]['name'];
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getSystemResource()
    {
        try {
            $resource = $this->API->comm('/system/resource/print');
            return $resource[0]['board-name'].' ('. $resource[0]['architecture-name'] .')';
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getData()
    {
        try {
            $hotspotactive = $this->API->comm('/ip/hotspot/active/print');
            $resource = $this->API->comm('/system/resource/print');
            $secret = $this->API->comm('/ppp/secret/print');
            $secretactive = $this->API->comm('/ppp/active/print');
            $interface = $this->API->comm('/interface/ethernet/print');
            $routerboard = $this->API->comm('/system/routerboard/print');
            $identity = $this->API->comm('/system/identity/print');


            $data = [
                'totalsecret' => count($secret),
                'totalhotspot' => count($hotspotactive),
                'hotspotactive' => count($hotspotactive),
                'secretactive' => count($secretactive),
                'cpu' => $resource[0]['cpu-load'],
                'uptime' => $resource[0]['uptime'],
                'version' => $resource[0]['version'],
                'interface' => $interface,
                'boardname' => $resource[0]['board-name'],
                'freememory' => $resource[0]['free-memory'],
                'freehdd' => $resource[0]['free-hdd-space'],
                'model' => $routerboard[0]['model'],
                'identity' => $identity[0]['name'],
            ];

            return $data;
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getCpuLoad()
    {
        try {
            $cpu = $this->API->comm('/system/resource/print');

            $data = [
                'cpu' => $cpu['0']['cpu-load'],
            ];

            return $data;
        } catch (ClientException $th) {
            return ['error' => $th->getMessage()];
        }
    }

    public function getUptime()
    {
        try {
            $uptime = $this->API->comm('/system/resource/print');

            $data = [
                'uptime' => $uptime['0']['uptime'],
            ];

            return $data;
        } catch (ClientException $th) {
            return ['error' => $th->getMessage()];
        }
    }

    public function getTrafic($traffic)
    {
        try {
            $traffic = $this->API->comm('/interface/monitor-traffic', array(
                'interface' => $traffic,
                'once' => '',
            ));

            $rx = $traffic[0]['rx-bits-per-second'];
            $tx = $traffic[0]['tx-bits-per-second'];

            $data = [
                'rx' => Helpers::formatBytes($rx),
                'tx' => Helpers::formatBytes($tx),
            ];

            return $data;
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
