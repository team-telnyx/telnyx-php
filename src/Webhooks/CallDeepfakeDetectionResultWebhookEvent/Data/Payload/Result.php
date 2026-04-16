<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallDeepfakeDetectionResultWebhookEvent\Data\Payload;

/**
 * Detection outcome. 'real' = human voice, 'fake' = AI-generated voice, 'silence_timeout' = no analyzable speech detected before timeout.
 */
enum Result: string
{
    case REAL = 'real';

    case FAKE = 'fake';

    case SILENCE_TIMEOUT = 'silence_timeout';
}
