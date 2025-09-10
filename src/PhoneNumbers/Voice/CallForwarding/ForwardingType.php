<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice\CallForwarding;

/**
 * Call forwarding type. 'forwards_to' must be set for this to have an effect.
 */
enum ForwardingType: string
{
    case ALWAYS = 'always';

    case ON_FAILURE = 'on-failure';
}
