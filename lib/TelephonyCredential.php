<?php

namespace Telnyx;

/**
 * Class TelephonyCredential
 *
 * @package Telnyx
 */
class TelephonyCredential extends ApiResource
{
    const OBJECT_NAME = "telephony_credential";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    use ApiOperations\Delete;
}
