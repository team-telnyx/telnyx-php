<?php

declare(strict_types=1);

namespace Telnyx\AI\Avatars;

/**
 * Stable identifier of a Telnyx stock avatar or an organization-owned custom avatar. Custom avatar IDs are returned by the Avatars API and use the `avatar_` prefix.
 */
enum AvatarID: string
{
    case ELENA = 'elena';

    case BEN = 'ben';

    case JORDAN = 'jordan';

    case LIN = 'lin';

    case AVERY = 'avery';

    case RAPHAEL = 'raphael';
}
