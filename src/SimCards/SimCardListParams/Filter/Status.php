<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardListParams\Filter;

enum Status: string
{
    case ENABLED = 'enabled';

    case DISABLED = 'disabled';

    case STANDBY = 'standby';

    case DATA_LIMIT_EXCEEDED = 'data_limit_exceeded';

    case UNAUTHORIZED_IMEI = 'unauthorized_imei';
}
