<?php

namespace App\Services;

use App\Models\RouterosAPI;
use GuzzleHttp\Exception\ClientException;

class InterfaceService
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

    public function getInterfaces()
    {
        try {
            $interfaces = $this->API->comm('/interface/print');
            return $interfaces;
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function setIntStatus($id)
    {
        try {
            $int = $this->API->comm('/interface/print', [
                '?.id' => $id
            ]);
            if ($int[0]['disabled'] == 'true') :
                $this->API->comm('/interface/set', [
                    '.id' => $id,
                    'disabled' => 'no'
                ]);
            else:
                $this->API->comm('/interface/set', [
                    '.id' => $id,
                    'disabled' => 'yes'
                ]);
            endif;
            return ['error' => false, 'message' => 'Success'];
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function setInterface($interface, $id)
    {
        try {
            $int = $this->API->comm('/interface/print', [
                '?.id' => $id
            ]);
            if (count($int) > 0) :
                $this->API->comm('/interface/set', [
                    '.id' => $id,
                    'name' => $interface
                ]);
            endif;
            return ['error' => false, 'message' => 'Success'];
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
