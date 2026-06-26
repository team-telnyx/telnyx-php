<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\Messaging\MessagingGetResponse\Data;

/**
 * The type of the phone number.
 */
enum Type: string
{
    case LONGCODE = 'longcode';
}
