<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechListVoicesParams;

/**
 * Filter voices by provider.
 */
enum Provider: string
{
    case AWS = 'aws';

    case AZURE = 'azure';

    case ELEVENLABS = 'elevenlabs';

    case TELNYX = 'telnyx';
}
