<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data\Payload;

/**
 * The type of calling party connection.
 */
enum CallingPartyType: string
{
    case PSTN = 'pstn';

    case SIP = 'sip';
}
