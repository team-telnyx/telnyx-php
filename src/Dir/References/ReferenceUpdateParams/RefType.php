<?php

declare(strict_types=1);

namespace Telnyx\Dir\References\ReferenceUpdateParams;

enum RefType: string
{
    case BUSINESS = 'business';

    case FINANCIAL = 'financial';
}
