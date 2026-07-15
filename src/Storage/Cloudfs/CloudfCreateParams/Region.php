<?php

declare(strict_types=1);

namespace Telnyx\Storage\Cloudfs\CloudfCreateParams;

/**
 * Region where the filesystem's storage and metadata are provisioned.
 */
enum Region: string
{
    case US_CENTRAL_1 = 'us-central-1';

    case US_EAST_1 = 'us-east-1';

    case US_WEST_1 = 'us-west-1';
}
