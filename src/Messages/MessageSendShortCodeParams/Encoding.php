<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendShortCodeParams;

/**
 * Encoding to use for the message. `auto` (default) uses smart encoding to automatically select the most efficient encoding. `gsm7` forces GSM-7 encoding (returns 400 if message contains characters that cannot be encoded). `ucs2` forces UCS-2 encoding and disables smart encoding. When set, this overrides the messaging profile's `smart_encoding` setting.
 */
enum Encoding: string
{
    case AUTO = 'auto';

    case GSM7 = 'gsm7';

    case UCS2 = 'ucs2';
}
