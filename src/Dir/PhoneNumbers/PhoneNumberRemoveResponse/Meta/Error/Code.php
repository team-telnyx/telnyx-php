<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumbers\PhoneNumberRemoveResponse\Meta\Error;

/**
 * Stable per-number error code. Currently only `not_associated` is emitted, when the number is not attached to this DIR.
 */
enum Code: string
{
    case NOT_ASSOCIATED = 'not_associated';
}
