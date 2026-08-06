<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberOrderStatusUpdateWebhookEvent\Data\Payload\PhoneNumber;

/**
 * Phone number type.
 */
enum PhoneNumberType: string
{
    case LOCAL = 'local';

    case MOBILE = 'mobile';

    case NATIONAL = 'national';

    case SHARED_COST = 'shared_cost';

    case TOLL_FREE = 'toll_free';
}
