<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\RecordingExportFailedWebhookEvent;

/**
 * Event type.
 */
enum Event: string
{
    case RECORDING_EXPORT_FAILED = 'recording.export_failed';
}
