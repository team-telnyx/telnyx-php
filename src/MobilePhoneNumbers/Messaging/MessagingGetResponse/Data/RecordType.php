<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\Messaging\MessagingGetResponse\Data;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case MESSAGING_PHONE_NUMBER = 'messaging_phone_number';

    case MESSAGING_SETTINGS = 'messaging_settings';
}
