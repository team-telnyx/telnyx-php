<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenKeys\TokenKey;

/**
 * Provisioning state of the key's current policy. `pending`: retry readiness with bounded backoff (treat `unknown` the same). `inactive` and `unsupported` are terminal until the key, group, user or catalog changes. `unavailable` means provisioning is stuck and is retried slowly; surface it. Absent while the gateway runs in compatibility mode.
 */
enum Provisioning: string
{
    case READY = 'ready';

    case PENDING = 'pending';

    case UNAVAILABLE = 'unavailable';

    case INACTIVE = 'inactive';

    case UNSUPPORTED = 'unsupported';

    case UNKNOWN = 'unknown';
}
