<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Room;

/**
 */
class RoomServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Room\RoomRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Room\RoomResponse>
     */
    public function GetRoom(\Room\RoomRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/room.RoomService/GetRoom',
        $argument,
        ['\Room\RoomResponse', 'decode'],
        $metadata, $options);
    }

}
