<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\Client;
use Telnyx\ServiceContracts\AI\MemoryRawContract;

final class MemoryRawService implements MemoryRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
