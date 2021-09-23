<?php

namespace Telnyx\PhoneNumber;

/**
 * Class Messaging
 *
 * @package Telnyx
 */
class Messaging extends \Telnyx\ApiResource
{
    const OBJECT_NAME = "messaging_settings";
    const OBJECT_URL = "/v2/phone_numbers/messaging";

    use \Telnyx\ApiOperations\All;
}
