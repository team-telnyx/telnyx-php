<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageGetResponse\Data\InboundMessagePayload;

/**
 * The type of message. This value can be either 'sms' or 'mms'.
 */
enum Type: string
{
    case SMS = 'SMS';

    case MMS = 'MMS';
}
