<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallPlaybackEndedWebhookEvent\Data1;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_PLAYBACK_ENDED = 'call.playback.ended';
}
