<?php

declare(strict_types=1);

namespace Telnyx\Dir\References\ReferenceListResponse\Data;

/**
 * Always `dir_reference`.
 */
enum RecordType: string
{
    case DIR_REFERENCE = 'dir_reference';
}
