<?php

declare(strict_types=1);

namespace Telnyx\AuditEvents\AuditEventListParams;

/**
 * Set the order of the results by the creation date.
 */
enum Sort: string
{
    case ASC = 'asc';

    case DESC = 'desc';
}
