<?php

namespace App\Services;

use App\Exceptions\CustomException;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthService
{
    /**
     * @param array $credentials
     * @return mixed
     * @throws CustomException
     */
    public function login(array $credentials): mixed
    {
        try {
            if (!FacadesAuth::attempt($credentials)) {
                throw new CustomException(__('Giriş bilgileri yanlış.'));
            }

            $user = FacadesAuth::user();
            $token = $user->createToken('Personal Access Token')->plainTextToken;

            $data = [
                'last_login_at' => Carbon::now('Europe/Istanbul')->toDateTimeString()
            ];

            $user->update($data);
        } catch (Exception $e) {
            $message = 'LOGIN_SYSTEM_FAIL';
            throw new CustomException($message, $e->getCode(), $e->getPrevious());
        }

        return $token;
    }
}
