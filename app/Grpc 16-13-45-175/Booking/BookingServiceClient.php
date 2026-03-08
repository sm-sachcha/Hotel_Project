<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Booking;

/**
 */
class BookingServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Booking\BookingRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Booking\BookingResponse>
     */
    public function GetBooking(\Booking\BookingRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/booking.BookingService/GetBooking',
        $argument,
        ['\Booking\BookingResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Booking\CreateBookingRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Booking\BookingResponse>
     */
    public function CreateBooking(\Booking\CreateBookingRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/booking.BookingService/CreateBooking',
        $argument,
        ['\Booking\BookingResponse', 'decode'],
        $metadata, $options);
    }

}
