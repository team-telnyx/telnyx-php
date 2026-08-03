<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages\Recipients\RecipientListParams;

/**
 * Filter recipients by address kind.
 */
enum Kind: string
{
    case TO = 'to';

    case CC = 'cc';

    case BCC = 'bcc';
}
