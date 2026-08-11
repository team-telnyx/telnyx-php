<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Brands\BrandResponse;

enum Status: string
{
    case CREATED = 'CREATED';

    case CONFIGURED = 'CONFIGURED';

    case SUBMITTED = 'SUBMITTED';

    case REVIEWING = 'REVIEWING';

    case VETTING = 'VETTING';

    case VERIFIED = 'VERIFIED';

    case REJECTED = 'REJECTED';

    case FAILED = 'FAILED';
}
