<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes\NetworkRouteListParams\Filter;

/**
 * Only routes of this origin.
 */
enum Origin: string
{
    case STATIC = 'static';

    case ATTACHMENT = 'attachment';
}
