<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterpriseListResponse;

/**
 * Employee count range.
 */
enum NumberOfEmployees: string
{
    case _1_10 = '1-10';

    case _11_50 = '11-50';

    case _51_200 = '51-200';

    case _201_500 = '201-500';

    case _501_2000 = '501-2000';

    case _2001_10000 = '2001-10000';

    case _10001 = '10001+';
}
