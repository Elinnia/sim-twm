<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tb_User;
use App\Models\Tb_Guru;
use App\Models\Tb_Siswa;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Libs\FileUpload;

use JWTAuth;
use Exception;

use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'user_email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            $response = array(
                'success' => 0,
                'message' => $validator->errors()
            );
            return response()->json($response, 500);
        }

        $cek_data = Tb_User::count('user_id');

        if ($cek_data > 0) {
            $request_login = $request->only('user_email', 'password');
            $token = Auth::guard('api')->attempt($request_login);

            if (!$token) {
                return response()->json(['success' => false, 'message' => 'Incorrect email or password or level, Please check again before login!', 'data' => []], 401);
            }

            $data_user = Tb_User::where('user_id', Auth::guard('api')->user()->user_id)->first();

            if($data_user->user_type=="siswa"){
                $data_user->siswa = Tb_Siswa::with("jurusan")->where("nisn",$data_user->user_conid)->first();
                $data_user->siswa->photo = FileUpload::GetFile("siswa",$data_user->siswa->photo);
            }
            else{
                $data_user->guru = Tb_Guru::where("nip",$data_user->user_conid)->first();
                $data_user->guru->photo = FileUpload::GetFile("guru",$data_user->guru->photo);
            }
            
            

            $response = [
                'success' => true,
                'message' => 'Login Berhasil',
                'data' =>  $data_user,
                'token' => [
                    'access_token' => 'Bearer '.$token,
                    'token_type' => 'Bearer',
                    'expires_in' => JWTAuth::factory()->getTTL()
                ]
            ];

            return response()->json($response, 200);
        } else {
            return response()->json(['success' => 0, 'message' => 'Email atau user belum terdaftar, silahkan cek kembali email dan password anda!', 'data' => []], 401);
        }
    }

    public function refresh()
    {
        $token = JWTAuth::getToken();
        try {
            $new_token = Auth::guard('api')->refresh(true, true);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 401);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }

        $response = [
            'success' => true,
            'message' => 'Successfully refresh token',
            'token' => [
                'access_token' => 'Bearer '.$new_token,
                'token_type' => 'Bearer',
                'expires_in' => JWTAuth::factory()->getTTL()
            ],
        ];
        return response()->json($response, 200);
    }

}
