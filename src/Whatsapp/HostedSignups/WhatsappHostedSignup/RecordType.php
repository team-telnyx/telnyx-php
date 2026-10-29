<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\HostedSignups\WhatsappHostedSignup;

enum RecordType: string
{
    case WHATSAPP_JWT = 'whatsapp_jwt';
}
