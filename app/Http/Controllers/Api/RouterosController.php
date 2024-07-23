<?php

namespace App\Http\Controllers\Api;

use App\Helpers\RouterosAPI;
use App\Http\Controllers\Controller;
use App\Models\RouterOS;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RouterosController extends Controller
{
    public function test_api()
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Welcome to routeros API'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetch data Routeros API'
            ]);
        }
    }

    public function store_routeros($data)
    {
        $API = new RouterosAPI();
        $connection = $API->connect($data['ip_address'], $data['login'], $data['password']);

        if (!$connection) return response()->json(['error' => true, 'message' => 'Routeros not connected ...'], 404);

        $store_routeros_data = [
            'identity' => $API->comm('/system/identity/print')[0]['name'],
            'ip_address' => $data['ip_address'],
            'login' => $data['login'],
            'password' => $data['password'],
            'connect' => $connection
        ];

        $store_routeros = new RouterOS;
        $store_routeros->identity = $store_routeros_data['identity'];
        $store_routeros->ip_address = $store_routeros_data['ip_address'];
        $store_routeros->login = $store_routeros_data['login'];
        $store_routeros->password = $store_routeros_data['password'];
        $store_routeros->connect = $store_routeros_data['connect'];
        $store_routeros->save();

        return response()->json([
            'success' => true,
            'message' => 'Routeros data has ben saved to database',
            'routeros_data' => $store_routeros
        ]);
    }

    public function routeros_connection(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'ip_address' => 'required',
                'login' => 'required',
                'password' => 'required'
            ]);

            if($validator->fails()) return response()->json($validator->errors(), 404);

            $req_data = [
                'ip_address' => $request->ip_address,
                'login' => $request->login,
                'password' => $request->password
            ];

            $routeros_db = RouterOS::where('ip_address', $req_data['ip_address'])->first();

            if ($routeros_db) {
                echo "lanjut connect ke router os";
            } else {
                return $this->store_routeros($request->all());
            }

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetch data Routeros API '. $e->getMessage()
            ]);
        }
    }
}
