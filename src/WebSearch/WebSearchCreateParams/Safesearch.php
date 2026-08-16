<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\WebSearchCreateParams;

/**
 * Safe search filter level.
 */
enum Safesearch: string
{
    case OFF = 'off';

    case MODERATE = 'moderate';

    case STRICT = 'strict';
}
