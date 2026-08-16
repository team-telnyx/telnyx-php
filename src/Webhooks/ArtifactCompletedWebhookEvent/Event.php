<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ArtifactCompletedWebhookEvent;

/**
 * Event type.
 */
enum Event: string
{
    case ARTIFACT_COMPLETED = 'artifact.completed';
}
