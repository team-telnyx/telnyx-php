<?php

declare(strict_types=1);

namespace Telnyx\Conferences\ConferenceCreateParams;

/**
 * Sets the region where the conference data will be hosted. Defaults to the region defined in user's data locality settings (Europe or US).
 */
enum Region: string
{
    case AUSTRALIA = 'Australia';

    case EUROPE = 'Europe';

    case MIDDLE_EAST = 'Middle East';

    case US = 'US';
}
