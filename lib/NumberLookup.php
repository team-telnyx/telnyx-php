<?php

namespace Telnyx;

/**
 * Class NumberLookup
 *
 * @package Telnyx
 */
class NumberLookup extends ApiResource
{
    const OBJECT_NAME = "number_lookup";
    const OBJECT_URL = "/v2/number_lookup";

    use ApiOperations\Retrieve;
}
