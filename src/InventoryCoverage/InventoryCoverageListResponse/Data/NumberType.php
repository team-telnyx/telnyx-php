<?php

declare(strict_types=1);

namespace Telnyx\InventoryCoverage\InventoryCoverageListResponse\Data;

enum NumberType: string
{
    case DID = 'did';

    case TOLL_FREE = 'toll-free';
}
