<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

enum ObservabilityStatus: string
{
    case ENABLED = 'enabled';

    case DISABLED = 'disabled';
}
