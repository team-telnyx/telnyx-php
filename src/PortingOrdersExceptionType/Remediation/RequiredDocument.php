<?php

declare(strict_types=1);

namespace Telnyx\PortingOrdersExceptionType\Remediation;

/**
 * The document to (re)upload, when applicable.
 */
enum RequiredDocument: string
{
    case LOA = 'loa';

    case INVOICE = 'invoice';

    case NULL = 'null';
}
