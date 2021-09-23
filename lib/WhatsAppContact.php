<?php

namespace Telnyx;

/**
 * Class WhatsAppContact
 *
 * @package Telnyx
 */
class WhatsAppContact extends ApiResource
{
    const OBJECT_NAME = "whatsapp_contact";

    use ApiOperations\Create{
        create as check; // Alias for check()
    }
}
