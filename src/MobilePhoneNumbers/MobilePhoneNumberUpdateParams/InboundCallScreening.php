<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams;

enum InboundCallScreening: string
{
    case DISABLED = 'disabled';

    case REJECT_CALLS = 'reject_calls';

    case FLAG_CALLS = 'flag_calls';
}
