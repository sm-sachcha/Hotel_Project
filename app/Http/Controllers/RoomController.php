<?php
namespace App\Http\Controllers;

use App\Services\RoomGrpcClient;

class RoomController extends Controller
{
    public function grpcRoom($id)
    {
        $grpc = new RoomGrpcClient();
        $room = $grpc->getRoom($id);

        return response()->json([
            'id' => $room->getId(),
            'title' => $room->getTitle(),
            'price' => $room->getPrice(),
        ]);
    }
}