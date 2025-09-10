<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter;

/**
 * Filter by usage_payment_method.
 */
enum VoiceUsagePaymentMethod: string
{
    case PAY_PER_MINUTE = 'pay-per-minute';

    case CHANNEL = 'channel';
}
