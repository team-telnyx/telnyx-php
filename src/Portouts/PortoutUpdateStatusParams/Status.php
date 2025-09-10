<?php

declare(strict_types=1);

namespace Telnyx\Portouts\PortoutUpdateStatusParams;

enum Status: string
{
    case AUTHORIZED = 'authorized';

    case REJECTED_PENDING = 'rejected-pending';
}
