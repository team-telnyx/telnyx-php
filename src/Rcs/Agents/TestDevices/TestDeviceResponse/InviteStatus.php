<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents\TestDevices\TestDeviceResponse;

enum InviteStatus: string
{
    case PENDING = 'PENDING';

    case ACCEPTED = 'ACCEPTED';

    case DECLINED = 'DECLINED';
}
