<?php

namespace Telnyx;

/**
 * Class Address
 *
 * @package Telnyx
 */
class Address extends ApiResource
{
    const OBJECT_NAME = "address";
    const OBJECT_URL = "/v2/addresses";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
}
