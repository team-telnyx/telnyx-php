<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs\DedicatedIPCreateParams;

/**
 * Allocate an IP in this region. Supported value: `ewr-nj1`. Any other value, including an empty string or `null`, returns `422`.
 */
enum Region: string
{
    case EWR_NJ1 = 'ewr-nj1';
}
