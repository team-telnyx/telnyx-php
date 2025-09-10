<?php

declare(strict_types=1);

namespace Telnyx\Invoices\InvoiceRetrieveParams;

/**
 * Invoice action.
 */
enum Action: string
{
    case JSON = 'json';

    case LINK = 'link';
}
