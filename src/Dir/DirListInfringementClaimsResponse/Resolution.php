<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirListInfringementClaimsResponse;

/**
 * Set only when `status` is `resolved`.
 */
enum Resolution: string
{
    case UPHELD = 'upheld';

    case REJECTED = 'rejected';

    case MODIFIED = 'modified';
}
