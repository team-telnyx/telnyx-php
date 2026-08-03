<?php

declare(strict_types=1);

namespace Telnyx\AI\ModelMetadata;

enum ServiceTier: string
{
    case DEFAULT = 'default';

    case PRIORITY = 'priority';

    case FLEX = 'flex';
}
