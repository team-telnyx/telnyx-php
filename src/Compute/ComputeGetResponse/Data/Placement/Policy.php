<?php

declare(strict_types=1);

namespace Telnyx\Compute\ComputeGetResponse\Data\Placement;

enum Policy: string
{
    case EVERYWHERE = 'everywhere';

    case SINGLE_SITE = 'single_site';
}
