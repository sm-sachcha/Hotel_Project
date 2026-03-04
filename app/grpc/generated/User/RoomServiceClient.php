<?php
// GENERATED CODE -- DO NOT EDIT!

namespace User;

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
     * @param \User\UserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\User\UserResponse>
     */
    public function GetUserDetails(\User\UserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/user.RoomService/GetUserDetails',
        $argument,
        ['\User\UserResponse', 'decode'],
        $metadata, $options);
    }

}
