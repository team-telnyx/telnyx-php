<?php

namespace Telnyx;

/**
 * Class WhatsAppMessage
 *
 * @package Telnyx
 */
class WhatsAppMessage extends ApiResource
{
    const OBJECT_NAME = "whatsapp_message";

    use ApiOperations\Create{
        create as send; // Alias for send()
    }
    use ApiOperations\Update{
        update as mark_read; // Alias for mark_read()
    }
}
