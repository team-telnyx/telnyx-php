<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse\ExternalUacSettings;

enum Transport: string
{
    case TCP = 'TCP';

    case UDP = 'UDP';

    case TLS = 'TLS';
}
