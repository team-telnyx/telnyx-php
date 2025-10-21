<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallPlaybackStartedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_PLAYBACK_STARTED = 'call.playback.started';
}
