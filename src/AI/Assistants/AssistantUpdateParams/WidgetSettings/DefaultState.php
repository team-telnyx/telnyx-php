<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantUpdateParams\WidgetSettings;

/**
 * The default state of the widget.
 */
enum DefaultState: string
{
    case EXPANDED = 'expanded';

    case COLLAPSED = 'collapsed';
}
