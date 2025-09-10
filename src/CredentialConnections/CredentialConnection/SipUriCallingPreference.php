<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections\CredentialConnection;

/**
 * This feature enables inbound SIP URI calls to your Credential Auth Connection. If enabled for all (unrestricted) then anyone who calls the SIP URI <your-username>@telnyx.com will be connected to your Connection. You can also choose to allow only calls that are originated on any Connections under your account (internal).
 */
enum SipUriCallingPreference: string
{
    case DISABLED = 'disabled';

    case UNRESTRICTED = 'unrestricted';

    case INTERNAL = 'internal';
}
