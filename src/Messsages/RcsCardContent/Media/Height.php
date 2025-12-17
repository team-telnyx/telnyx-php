<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsCardContent\Media;

/**
 * The height of the media within a rich card with a vertical layout. For a standalone card with horizontal layout, height is not customizable, and this field is ignored.
 */
enum Height: string
{
    case HEIGHT_UNSPECIFIED = 'HEIGHT_UNSPECIFIED';

    case SHORT = 'SHORT';

    case MEDIUM = 'MEDIUM';

    case TALL = 'TALL';
}
