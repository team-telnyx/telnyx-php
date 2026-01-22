<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\VersionUpdateParams\WidgetSettings\AudioVisualizerConfig;

/**
 * The color theme for the audio visualizer.
 */
enum Color: string
{
    case VERDANT = 'verdant';

    case TWILIGHT = 'twilight';

    case BLOOM = 'bloom';

    case MYSTIC = 'mystic';

    case FLARE = 'flare';

    case GLACIER = 'glacier';
}
