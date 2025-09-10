<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings;

/**
 * The inbound_call_screening setting is a phone number configuration option variable that allows users to configure their settings to block or flag fraudulent calls. It can be set to disabled, reject_calls, or flag_calls. This feature has an additional per-number monthly cost associated with it.
 */
enum InboundCallScreening: string
{
    case DISABLED = 'disabled';

    case REJECT_CALLS = 'reject_calls';

    case FLAG_CALLS = 'flag_calls';
}
