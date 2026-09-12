<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs\FuncGetShipInspectionResponse\Data;

enum Stage: string
{
    case BUILD = 'build';

    case PLATFORM = 'platform';

    case PRE_BUILD = 'pre_build';

    case DEPLOY = 'deploy';

    case SECURITY_REVIEW = 'security_review';

    case NONE = 'none';

    case PENDING = 'pending';
}
