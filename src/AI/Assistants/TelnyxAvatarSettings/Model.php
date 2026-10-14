<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelnyxAvatarSettings;

/**
 * Required avatar model identifier, separate from `avatar_id`. The supported value is `foxtrot-1`. Omission, null, and unsupported model identifiers are rejected.
 */
enum Model: string
{
    case FOXTROT_1 = 'foxtrot-1';
}
