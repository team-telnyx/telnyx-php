<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\TranscriptCompletedWebhookEvent;

/**
 * Event type.
 */
enum Event: string
{
    case TRANSCRIPT_COMPLETED = 'transcript.completed';
}
