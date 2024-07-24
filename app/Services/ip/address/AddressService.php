<?php

namespace App\Services\ip\address;

use App\Models\RouterosAPI;
use GuzzleHttp\Exception\ClientException;

class AddressService
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

    public function getAddressList()
    {
        try {
            $addressList = $this->API->comm('/ip/address/print');
            return $addressList;
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function addAddress($data)
    {
        try {
            $this->API->comm('/ip/address/add', [
                'address' => $data['address'],
                'network' => $data['network'],
                'interface' => $data['interface'],
            ]);
            return ['success' => 'Address added successfully'];
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function updateAddress($data, $id)
    {
        try {
            $this->API->comm('/ip/address/set', [
                '.id' => $id,
                'address' => $data['address'],
                'network' => $data['network'],
                'interface' => $data['interface'],
            ]);
            return ['success' => 'Address updated successfully'];
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function setStatusAddress($id)
    {
        try {
            $add = $this->API->comm('/ip/address/print', [
                '?.id' => $id
            ]);
            if ($add[0]['disabled'] == 'true') :
                $this->API->comm('/ip/address/set', [
                    '.id' => $id,
                    'disabled' => 'no',
                ]);
            else :
                $this->API->comm('/ip/address/set', [
                    '.id' => $id,
                    'disabled' => 'yes',
                ]);
            endif;
            return ['error' => false, 'message' => 'Success'];
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function deleteAddress($id)
    {
        try {
            $this->API->comm('/ip/address/remove', [
                '.id' => $id
            ]);
            return ['success' => 'Address deleted successfully'];
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
