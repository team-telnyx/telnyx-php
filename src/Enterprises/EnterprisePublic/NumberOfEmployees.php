<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterprisePublic;

/**
 * Employee count range.
 */
enum NumberOfEmployees: string
{
    case NUMBER_OF_EMPLOYEES_1_10 = '1-10';

    case NUMBER_OF_EMPLOYEES_11_50 = '11-50';

    case NUMBER_OF_EMPLOYEES_51_200 = '51-200';

    case NUMBER_OF_EMPLOYEES_201_500 = '201-500';

    case NUMBER_OF_EMPLOYEES_501_2000 = '501-2000';

    case NUMBER_OF_EMPLOYEES_2001_10000 = '2001-10000';

    case NUMBER_OF_EMPLOYEES_10001_PLUS = '10001+';
}
