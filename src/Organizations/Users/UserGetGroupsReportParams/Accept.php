<?php

declare(strict_types=1);

namespace Telnyx\Organizations\Users\UserGetGroupsReportParams;

enum Accept: string
{
    case APPLICATION_JSON = 'application/json';

    case TEXT_CSV = 'text/csv';
}
