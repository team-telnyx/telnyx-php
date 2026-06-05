<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirListInfringementClaimsResponse;

/**
 * Category of infringement being claimed.
 */
enum ClaimType: string
{
    case TRADEMARK = 'trademark';

    case COPYRIGHT = 'copyright';
}
