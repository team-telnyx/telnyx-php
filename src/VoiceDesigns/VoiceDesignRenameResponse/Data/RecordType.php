<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns\VoiceDesignRenameResponse\Data;

/**
 * Identifies the resource type.
 */
enum RecordType: string
{
    case VOICE_DESIGN = 'voice_design';
}
