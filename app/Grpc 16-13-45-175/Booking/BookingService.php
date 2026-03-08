<?php

namespace App\Grpc\Booking;

use Booking\BookingServiceInterface;
use Booking\BookingRequest;
use Booking\BookingResponse;

class BookingService implements BookingServiceInterface
{
    public function GetBooking(BookingRequest $request): BookingResponse
    {
        $response = new BookingResponse();
        $response->setId($request->getId());
        $response->setRoomId(101); // example
        $response->setCustomerName("Test User");
        return $response;
    }

    public function CreateBooking($request): BookingResponse
    {
        $response = new BookingResponse();
        $response->setId(1); // example generated id
        $response->setRoomId($request->getRoomId());
        $response->setCustomerName($request->getCustomerName());
        return $response;
    }
}
