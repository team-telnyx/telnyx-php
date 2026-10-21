<?php

declare(strict_types=1);

namespace Telnyx\AI\Avatars;

/**
 * Whether the avatar is provided by Telnyx or was uploaded by the authenticated organization.
 */
enum AvatarType: string
{
    case STOCK = 'stock';

    case CUSTOM = 'custom';
}
