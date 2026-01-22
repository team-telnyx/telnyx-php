<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\WidgetSettings;

/**
 * The visual theme for the widget.
 */
enum Theme: string
{
    case LIGHT = 'light';

    case DARK = 'dark';
}
