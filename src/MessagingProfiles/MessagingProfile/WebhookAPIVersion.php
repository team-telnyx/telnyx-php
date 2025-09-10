<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\MessagingProfile;

/**
 * Determines which webhook format will be used, Telnyx API v1, v2, or a legacy 2010-04-01 format.
 */
enum WebhookAPIVersion: string
{
    case WEBHOOK_API_VERSION_1 = '1';

    case WEBHOOK_API_VERSION_2 = '2';

    case WEBHOOK_API_VERSION_2010_04_01 = '2010-04-01';
}
