<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

/**
 * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
 */
enum ConferenceRegion: string
{
    case AUSTRALIA = 'Australia';

    case EUROPE = 'Europe';

    case MIDDLE_EAST = 'Middle East';

    case US = 'US';
}
