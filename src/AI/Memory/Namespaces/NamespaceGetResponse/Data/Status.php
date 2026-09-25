<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\NamespaceGetResponse\Data;

/**
 * Where the write is. `completed`, `failed` and `cancelled` are terminal: stop polling at any of them, and treat `failed` and `cancelled` as writes that did not happen.
 */
enum Status: string
{
    case PENDING = 'pending';

    case PROCESSING = 'processing';

    case COMPLETED = 'completed';

    case FAILED = 'failed';

    case CANCELLED = 'cancelled';
}
