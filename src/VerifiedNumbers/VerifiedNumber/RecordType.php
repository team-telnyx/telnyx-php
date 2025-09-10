<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers\VerifiedNumber;

/**
 * The possible verified numbers record types.
 */
enum RecordType: string
{
    case VERIFIED_NUMBER = 'verified_number';
}
