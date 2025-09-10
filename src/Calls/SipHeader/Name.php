<?php

declare(strict_types=1);

namespace Telnyx\Calls\SipHeader;

/**
 * The name of the header to add.
 */
enum Name: string
{
    case USER_TO_USER = 'User-to-User';
}
