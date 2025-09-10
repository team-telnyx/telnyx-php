<?php

declare(strict_types=1);

namespace Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter;

enum Feature: string
{
    case SMS = 'sms';

    case MMS = 'mms';

    case VOICE = 'voice';

    case FAX = 'fax';

    case EMERGENCY = 'emergency';
}
