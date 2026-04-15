<?php

declare(strict_types=1);

namespace Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListParams;

/**
 * Sorts traffic policy profiles by the given field. Defaults to ascending order unless field is prefixed with a minus sign.
 */
enum Sort: string
{
    case SERVICE = 'service';

    case DESC_SERVICE = '-service';

    case TYPE = 'type';

    case DESC_TYPE = '-type';
}
