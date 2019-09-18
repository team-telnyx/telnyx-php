<?php

namespace Telnyx;

/**
 * Class MessagingShortCode
 *
 * @package Telnyx
 */
class MessagingShortCode extends ApiResource
{
    const OBJECT_NAME = "messaging_short_code";

    use ApiOperations\All;
    use ApiOperations\Retrieve;
}
