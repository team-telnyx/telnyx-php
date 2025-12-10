<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantImportParams;

/**
 * The external provider to import assistants from.
 */
enum Provider: string
{
    case ELEVENLABS = 'elevenlabs';

    case VAPI = 'vapi';

    case RETELL = 'retell';
}
