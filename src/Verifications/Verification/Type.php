<?php

declare(strict_types=1);

namespace Telnyx\Verifications\Verification;

/**
 * The possible types of verification.
 */
enum Type: string
{
    case SMS = 'sms';

    case CALL = 'call';

    case FLASHCALL = 'flashcall';
}
