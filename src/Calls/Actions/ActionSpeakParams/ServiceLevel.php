<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionSpeakParams;

/**
 * This parameter impacts speech quality, language options and payload types. When using `basic`, only the `en-US` language and payload type `text` are allowed.
 */
enum ServiceLevel: string
{
    case BASIC = 'basic';

    case PREMIUM = 'premium';
}
