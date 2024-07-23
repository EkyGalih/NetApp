<?php

namespace App\Http\Controllers\Api;

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
                echo "simpan routeros data ke database";
            }

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetch data Routeros API '. $e->getMessage()
            ]);
        }
    }
}
