<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes\NetworkRoute;

/**
 * `static` for a route added with `POST /network_routes`, `attachment` for a route that another resource installed and removes.
 */
enum Origin: string
{
    case STATIC = 'static';

    case ATTACHMENT = 'attachment';
}
