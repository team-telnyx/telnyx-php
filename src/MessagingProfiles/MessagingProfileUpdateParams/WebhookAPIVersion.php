<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\MessagingProfileUpdateParams;

/**
 * Determines which webhook format will be used, Telnyx API v1, v2, or a legacy 2010-04-01 format.
 */
enum WebhookAPIVersion: string
{
    case _1 = '1';

    case _2 = '2';

    case _2010_04_01 = '2010-04-01';
}
