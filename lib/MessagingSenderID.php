<?php

namespace Telnyx;

/**
 * Class MessagingSenderID
 *
 * @package Telnyx
 */
class MessagingSenderID extends ApiResource
{

    const OBJECT_NAME = "messaging_sender_id";

    use ApiOperations\All;
    use ApiOperations\Retrieve;
}
