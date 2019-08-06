<?php

namespace Telnyx\Error;

class InvalidRequest extends Base
{
    public function __construct(
        $message,
        $telnyxParam,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null,
        $httpHeaders = null
    ) {
        parent::__construct($message, $httpStatus, $httpBody, $jsonBody, $httpHeaders);
        $this->telnyxParam = $telnyxParam;
    }

    public function getTelnyxParam()
    {
        return $this->telnyxParam;
    }
}
