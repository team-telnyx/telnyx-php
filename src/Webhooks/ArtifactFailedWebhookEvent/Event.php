<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ArtifactFailedWebhookEvent;

/**
 * Event type.
 */
enum Event: string
{
    case ARTIFACT_FAILED = 'artifact.failed';
}
