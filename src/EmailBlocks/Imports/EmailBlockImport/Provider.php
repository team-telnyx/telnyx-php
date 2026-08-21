<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks\Imports\EmailBlockImport;

/**
 * Omitted when nil.
 */
enum Provider: string
{
    case SENDGRID = 'sendgrid';

    case MAILGUN = 'mailgun';

    case SES = 'ses';

    case GENERIC = 'generic';
}
