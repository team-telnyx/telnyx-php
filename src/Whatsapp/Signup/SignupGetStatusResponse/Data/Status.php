<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Signup\SignupGetStatusResponse\Data;

/**
 * `INCOMPLETE` waits for the Meta signup code, `PENDING` is in progress, `SUCCESS` finished provisioning, and `FAILURE` stopped at `state`.
 */
enum Status: string
{
    case INCOMPLETE = 'INCOMPLETE';

    case PENDING = 'PENDING';

    case SUCCESS = 'SUCCESS';

    case FAILURE = 'FAILURE';
}
