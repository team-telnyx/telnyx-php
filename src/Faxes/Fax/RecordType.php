<?php

declare(strict_types=1);

namespace Telnyx\Faxes\Fax;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case FAX = 'fax';
}
