<?php

namespace Telnyx;

/**
 * Class Fax
 *
 * @package Telnyx
 */
class Fax extends ApiResource
{
    const OBJECT_NAME = "fax";
    const OBJECT_URL = "/v2/faxes";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
}
