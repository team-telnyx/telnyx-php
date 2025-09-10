<?php

declare(strict_types=1);

namespace Telnyx\Conferences\ConferenceListParams\Filter;

/**
 * Filter by product.
 */
enum Product: string
{
    case CALL_CONTROL = 'call_control';

    case FAX = 'fax';

    case TEXML = 'texml';
}
