<?php

namespace App\Services;

use Room\RoomServiceClient;
use Room\RoomRequest;
use Grpc\ChannelCredentials;

class RoomGrpcClient
{
    protected $client;

    public function __construct()
    {
        // Use fully qualified class name to avoid "ChannelCredentials" errors
        $this->client = new RoomServiceClient(
            'localhost:50051',
            ['credentials' => \Grpc\ChannelCredentials::createInsecure()]
        );
    }

    public function getRoom($id)
    {
        $request = new RoomRequest();
        $request->setId($id);

        // Call gRPC method
        list($response, $status) = $this->client->GetRoom($request)->wait();

        if ($status->code !== 0) {
            throw new \Exception("gRPC Error: " . $status->details);
        }

        return $response;
    }
}