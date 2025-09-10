<?php

declare(strict_types=1);

namespace Telnyx\InventoryCoverage\InventoryCoverageListResponse\Data;

enum CoverageType: string
{
    case NUMBER = 'number';

    case BLOCK = 'block';
}
