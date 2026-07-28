<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages\Recipients\EmailRecipient;

enum Kind: string
{
    case TO = 'to';

    case CC = 'cc';

    case BCC = 'bcc';
}
