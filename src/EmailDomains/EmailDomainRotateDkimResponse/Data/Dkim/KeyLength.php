<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data\Dkim;

enum KeyLength: int
{
    case KEY_LENGTH_2048 = 2048;
}
