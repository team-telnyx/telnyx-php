<?php

declare(strict_types=1);

namespace Telnyx\Faxes\Fax;

/**
 * The quality of the fax. The `ultra` settings provides the highest quality available, but also present longer fax processing times. `ultra_light` is best suited for images, wihle `ultra_dark` is best suited for text.
 */
enum Quality: string
{
    case NORMAL = 'normal';

    case HIGH = 'high';

    case VERY_HIGH = 'very_high';

    case ULTRA_LIGHT = 'ultra_light';

    case ULTRA_DARK = 'ultra_dark';
}
