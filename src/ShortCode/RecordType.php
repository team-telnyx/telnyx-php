<?php

declare(strict_types=1);

namespace Telnyx\ShortCode;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case SHORT_CODE = 'short_code';
}
