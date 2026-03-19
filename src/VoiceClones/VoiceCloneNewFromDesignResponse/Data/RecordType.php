<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneNewFromDesignResponse\Data;

/**
 * Identifies the resource type.
 */
enum RecordType: string
{
    case VOICE_CLONE = 'voice_clone';
}
