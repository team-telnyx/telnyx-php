<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents\AgentConsentConfiguration\OptInMethod;

enum MethodType: string
{
    case SMS = 'SMS';

    case WEBSITE = 'WEBSITE';

    case MOBILE_APP = 'MOBILE_APP';

    case QR_CODE = 'QR_CODE';

    case SALE_POINT = 'SALE_POINT';

    case OTHER = 'OTHER';
}
