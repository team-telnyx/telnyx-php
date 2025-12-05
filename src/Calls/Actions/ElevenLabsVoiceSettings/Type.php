<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ElevenLabsVoiceSettings;

/**
 * Voice settings provider type.
 */
enum Type: string
{
    case ELEVENLABS = 'elevenlabs';
}
