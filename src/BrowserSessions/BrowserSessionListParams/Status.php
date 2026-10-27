<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\BrowserSessionListParams;

enum Status: string
{
    case PROVISIONING = 'provisioning';

    case READY = 'ready';

    case CLOSING = 'closing';

    case CLOSED = 'closed';

    case FAILED = 'failed';

    case EXPIRED = 'expired';
}
