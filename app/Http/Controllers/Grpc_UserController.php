<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserGrpcClient;

class Grpc_UserController extends Controller
{
    protected $userClient;

    public function __construct(UserGrpcClient $userClient)
    {
        $this->userClient = $userClient;
    }

    public function grpcUser($id)
    {
        $user = $this->userClient->getUserDetails($id);

        return response()->json($user);
    }
}