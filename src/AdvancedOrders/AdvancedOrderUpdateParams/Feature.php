<?php

declare(strict_types=1);

namespace Telnyx\AdvancedOrders\AdvancedOrderUpdateParams;

enum Feature: string
{
    case SMS = 'sms';

    case MMS = 'mms';

    case VOICE = 'voice';

    case FAX = 'fax';

    case EMERGENCY = 'emergency';
}
