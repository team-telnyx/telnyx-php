<?php

namespace Telnyx;

/**
 * Class WhatsAppUser
 *
 * @package Telnyx
 */
class WhatsAppUser extends ApiResource
{
    const OBJECT_NAME = "whatsapp_user";

    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    
}
