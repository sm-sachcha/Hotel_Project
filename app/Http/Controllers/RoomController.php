<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoomGrpcClient;

class RoomController extends Controller
{
    protected $roomClient;

    public function __construct(RoomGrpcClient $roomClient)
    {
        $this->roomClient = $roomClient;
    }

    public function grpcRoom($id)
    {
        $room = $this->roomClient->getRoom($id);

        return response()->json($room);
    }
}