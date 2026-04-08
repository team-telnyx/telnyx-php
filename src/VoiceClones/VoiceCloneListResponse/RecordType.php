<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneListResponse;

/**
 * Identifies the resource type.
 */
enum RecordType: string
{
    case VOICE_CLONE = 'voice_clone';
}
