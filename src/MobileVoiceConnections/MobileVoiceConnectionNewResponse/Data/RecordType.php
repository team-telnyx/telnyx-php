<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections\MobileVoiceConnectionNewResponse\Data;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case MOBILE_VOICE_CONNECTION = 'mobile_voice_connection';
}
