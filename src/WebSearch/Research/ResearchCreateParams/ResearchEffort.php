<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\Research\ResearchCreateParams;

/**
 * Research depth level. `lite` is fastest, `deep` is most thorough.
 */
enum ResearchEffort: string
{
    case LITE = 'lite';

    case STANDARD = 'standard';

    case DEEP = 'deep';
}
