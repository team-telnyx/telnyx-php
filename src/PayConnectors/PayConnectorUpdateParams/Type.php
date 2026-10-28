<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors\PayConnectorUpdateParams;

/**
 * Generic connector type. Omit to preserve the existing value.
 */
enum Type: string
{
    case GENERIC = 'generic';
}
