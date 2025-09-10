<?php

declare(strict_types=1);

namespace Telnyx\Invoices\InvoiceListParams;

/**
  * Specifies the sort order for results.
  * 
 */
enum Sort : string
{

    case PERIOD_START = "period_start";

    case SORT_-PERIOD_START = "-period_start";

}