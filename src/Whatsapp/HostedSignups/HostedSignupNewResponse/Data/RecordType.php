<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\HostedSignups\HostedSignupNewResponse\Data;

enum RecordType: string
{
    case WHATSAPP_JWT = 'whatsapp_jwt';
}
