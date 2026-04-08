<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Observability;

enum Status: string
{
    case ENABLED = 'enabled';

    case DISABLED = 'disabled';
}
