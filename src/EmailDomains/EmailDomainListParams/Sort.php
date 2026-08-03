<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainListParams;

/**
 * Field to sort by. Prefix with `-` for descending order.
 */
enum Sort: string
{
    case CREATED_AT = 'created_at';

    case CREATED_AT_DESC = '-created_at';

    case DOMAIN = 'domain';

    case MINUSDOMAIN = '-domain';
}
