<?php

declare(strict_types=1);

namespace Telnyx\AdvancedOrders\AdvancedOrderCreateParams;

enum Feature: string
{
    case SMS = 'sms';

    case MMS = 'mms';

    case VOICE = 'voice';

    case FAX = 'fax';

    case EMERGENCY = 'emergency';
}
