<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Brands;

enum BrandLegalEntityType: string
{
    case LIMITED_LIABILITY_COMPANY = 'LIMITED_LIABILITY_COMPANY';

    case SOLE_PROPRIETORSHIP = 'SOLE_PROPRIETORSHIP';

    case PARTNERSHIP = 'PARTNERSHIP';

    case CORPORATION = 'CORPORATION';

    case S_CORPORATION = 'S_CORPORATION';
}
