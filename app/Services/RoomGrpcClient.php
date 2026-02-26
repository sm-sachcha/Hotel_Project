<?php

namespace App\Services;

use App\Models\Room;

class RoomGrpcClient
{
    public function getRoom($id)
    {
        $room = Room::find($id);

        if (!$room) {
            return [
                'id' => 0,
                'title' => '',
                'description' => '',
                'price' => '',
                'wifi' => '',
                'room_type' => '',
                'image' => ''
            ];
        }

        return [
            'id' => $room->id,
            'title' => $room->room_title,
            'description' => $room->description,
            'price' => $room->price,
            'wifi' => $room->wifi,
            'room_type' => $room->room_type,
            'image' => $room->image
        ];
    }
}