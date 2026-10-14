<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Signup\SignupGetStatusResponse\Data;

enum RecordType: string
{
    case WHATSAPP_SESSION_ID = 'whatsapp_session_id';
}
