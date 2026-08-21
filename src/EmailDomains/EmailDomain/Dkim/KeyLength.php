<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomain\Dkim;

enum KeyLength: int
{
    case KEY_LENGTH_2048 = 2048;
}
