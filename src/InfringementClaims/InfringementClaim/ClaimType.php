<?php

declare(strict_types=1);

namespace Telnyx\InfringementClaims\InfringementClaim;

/**
 * Category of infringement being claimed.
 */
enum ClaimType: string
{
    case TRADEMARK = 'trademark';

    case COPYRIGHT = 'copyright';
}
