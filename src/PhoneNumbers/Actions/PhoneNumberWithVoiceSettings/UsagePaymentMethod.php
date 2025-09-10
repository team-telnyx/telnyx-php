<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings;

/**
 * Controls whether a number is billed per minute or uses your concurrent channels.
 */
enum UsagePaymentMethod: string
{
    case PAY_PER_MINUTE = 'pay-per-minute';

    case CHANNEL = 'channel';
}
