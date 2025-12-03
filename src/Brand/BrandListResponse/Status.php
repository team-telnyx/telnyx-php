<?php

declare(strict_types=1);

namespace Telnyx\Brand\BrandListResponse;

/**
 * Status of the brand.
 */
enum Status: string
{
    case OK = 'OK';

    case REGISTRATION_PENDING = 'REGISTRATION_PENDING';

    case REGISTRATION_FAILED = 'REGISTRATION_FAILED';
}
