<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\RecordingExportedWebhookEvent;

/**
 * Event type.
 */
enum Event: string
{
    case RECORDING_EXPORTED = 'recording.exported';
}
