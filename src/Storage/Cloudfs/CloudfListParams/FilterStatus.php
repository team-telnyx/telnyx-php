<?php

declare(strict_types=1);

namespace Telnyx\Storage\Cloudfs\CloudfListParams;

/**
 * Return only filesystems with this status. Unrecognized values are ignored.
 */
enum FilterStatus: string
{
    case PROVISIONING = 'provisioning';

    case READY = 'ready';

    case NEEDS_FORMAT = 'needs_format';

    case DELETING = 'deleting';

    case FAILED = 'failed';
}
