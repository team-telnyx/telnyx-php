<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Sort;

/**
 * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
 */
enum Value: string
{
    case CREATED_AT_DESC = '-created_at';

    case CREATED_AT = 'created_at';
}
