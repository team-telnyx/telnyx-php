<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingData;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case WHATSAPP_CALLING_ROUTING = 'whatsapp_calling_routing';
}
