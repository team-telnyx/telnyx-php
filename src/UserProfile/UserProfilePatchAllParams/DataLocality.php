<?php

declare(strict_types=1);

namespace Telnyx\UserProfile\UserProfilePatchAllParams;

/**
 * Data locality: USA (United States), DEU (Germany), AUS (Australia), UAE (United Arab Emirates), or CAN (Canada). A change is permitted only if data locality has not previously been changed. A successful change sets data_locality_updated_at and initializes data_locality_migration_status to not_started.
 */
enum DataLocality: string
{
    case USA = 'USA';

    case DEU = 'DEU';

    case AUS = 'AUS';

    case UAE = 'UAE';

    case CAN = 'CAN';
}
