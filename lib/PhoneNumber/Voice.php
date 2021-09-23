<?php

namespace Telnyx\PhoneNumber;

/**
 * Class Voice
 *
 * @package Telnyx
 */
class Voice extends \Telnyx\ApiResource
{
    const OBJECT_NAME = "voice_settings";
    const OBJECT_URL = "/v2/phone_numbers/voice";

    use \Telnyx\ApiOperations\All;
}
