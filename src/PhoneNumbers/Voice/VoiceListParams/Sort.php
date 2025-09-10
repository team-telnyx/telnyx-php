<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice\VoiceListParams;

/**
 * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
 */
enum Sort: string
{
    case PURCHASED_AT = 'purchased_at';

    case PHONE_NUMBER = 'phone_number';

    case CONNECTION_NAME = 'connection_name';

    case USAGE_PAYMENT_METHOD = 'usage_payment_method';
}
