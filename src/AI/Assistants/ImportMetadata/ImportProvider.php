<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ImportMetadata;

/**
 * Provider the assistant was imported from.
 */
enum ImportProvider: string
{
    case ELEVENLABS = 'elevenlabs';

    case VAPI = 'vapi';
}
