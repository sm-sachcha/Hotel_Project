<?php

namespace App\Services;

use App\Models\User;

class UserGrpcClient
{
    public function getUserDetails($id)
    {
        $user = User::find($id);

        if (!$user) {
            return [
                'id' => 0,
                'name' => '',
                'email' => '',
                'phone' => ''
            ];
        }
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone
        ];
    }
}