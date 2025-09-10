<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter;

enum Feature: string
{
    case SMS = 'sms';

    case MMS = 'mms';

    case VOICE = 'voice';

    case FAX = 'fax';

    case EMERGENCY = 'emergency';

    case HD_VOICE = 'hd_voice';

    case INTERNATIONAL_SMS = 'international_sms';

    case LOCAL_CALLING = 'local_calling';
}
