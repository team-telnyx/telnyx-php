<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ArtifactCompletedWebhookEvent\Data;

/**
 * Type of the completed artifact.
 */
enum Type: string
{
    case SUMMARY = 'summary';

    case ACTION_ITEMS = 'action_items';

    case DECISIONS = 'decisions';

    case TOPICS = 'topics';

    case OPEN_QUESTIONS = 'open_questions';

    case CUSTOM = 'custom';
}
