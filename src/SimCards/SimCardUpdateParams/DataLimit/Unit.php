<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardUpdateParams\DataLimit;

enum Unit: string
{
    case MB = 'MB';

    case GB = 'GB';
}
