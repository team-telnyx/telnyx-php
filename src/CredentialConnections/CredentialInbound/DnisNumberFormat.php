<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections\CredentialInbound;

enum DnisNumberFormat: string
{
    case PLUS_E164 = '+e164';

    case E164 = 'e164';

    case NATIONAL = 'national';

    case SIP_USERNAME = 'sip_username';
}
