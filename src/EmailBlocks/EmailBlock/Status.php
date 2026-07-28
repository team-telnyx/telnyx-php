<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks\EmailBlock;

enum Status: string
{
    case ACTIVE = 'active';

    case EXPIRED = 'expired';

    case REMOVED = 'removed';
}
