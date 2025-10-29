<?php

declare(strict_types=1);

namespace Telnyx\Conferences\ConferenceRetrieveParams;

/**
 * Region where the conference data is located.
 */
enum Region: string
{
    case AUSTRALIA = 'Australia';

    case EUROPE = 'Europe';

    case MIDDLE_EAST = 'Middle East';

    case US = 'US';
}
