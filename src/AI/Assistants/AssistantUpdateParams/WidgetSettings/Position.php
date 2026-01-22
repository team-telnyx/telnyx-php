<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantUpdateParams\WidgetSettings;

/**
 * The positioning style for the widget.
 */
enum Position: string
{
    case FIXED = 'fixed';

    case STATIC = 'static';
}
