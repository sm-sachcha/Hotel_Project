<?php

require __DIR__ . '/../../vendor/autoload.php';

use Grpc\Server;
use Room\RoomServiceClient; // For method signature
use Room\RoomRequest;
use Room\RoomResponse;

// Simple fake server class for testing
class RoomService // We cannot extend RoomServiceInterface because it's missing
{
    // Simulate gRPC method
    public function GetRoom(RoomRequest $request)
    {
        $id = $request->getId();

        $response = new RoomResponse();
        $response->setId($id);
        $response->setTitle("Deluxe Room #" . $id);
        $response->setPrice("100$");

        return $response;
    }
}

// ⚠️ PHP gRPC server implementation is tricky without RoadRunner/Swoole.
// For **testing**, you can mock the response in Laravel client (already done).
// Or use a real gRPC server in Go/Node/Java for full end-to-end.

echo "PHP gRPC server is ready. Please run using a proper gRPC server.\n";