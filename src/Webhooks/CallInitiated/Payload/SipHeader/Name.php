<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallInitiated\Payload\SipHeader;

/**
 * The name of the header received from the SIP INVITE.
 */
enum Name: string
{
    case USER_TO_USER = 'User-to-User';

    case DIVERSION = 'Diversion';
}
