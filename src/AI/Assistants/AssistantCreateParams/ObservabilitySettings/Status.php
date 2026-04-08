<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantCreateParams\ObservabilitySettings;

enum Status: string
{
    case ENABLED = 'enabled';

    case DISABLED = 'disabled';
}
