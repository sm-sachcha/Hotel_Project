<?php

require __DIR__ . '/vendor/autoload.php';

use Grpc\Server;
use App\Grpc\Room\RoomService;
use App\Grpc\Booking\BookingService;

// Create gRPC server
$server = new Server();

// Register services
$server->addService(\Room\RoomServiceInterface::class, new RoomService());
$server->addService(\Booking\BookingServiceInterface::class, new BookingService());

// Bind to port 50051
$server->bind('0.0.0.0:50051');

// Start the server
echo "gRPC server started on 0.0.0.0:50051\n";

$server->start();
