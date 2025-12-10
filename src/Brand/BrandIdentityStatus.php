<?php

declare(strict_types=1);

namespace Telnyx\Brand;

/**
 * The verification status of an active brand.
 */
enum BrandIdentityStatus: string
{
    case VERIFIED = 'VERIFIED';

    case UNVERIFIED = 'UNVERIFIED';

    case SELF_DECLARED = 'SELF_DECLARED';

    case VETTED_VERIFIED = 'VETTED_VERIFIED';
}
