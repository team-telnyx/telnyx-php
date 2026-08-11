<?php

declare(strict_types=1);

namespace Telnyx\Services\Rcs;

use Telnyx\Client;
use Telnyx\ServiceContracts\Rcs\AgentsRawContract;

final class AgentsRawService implements AgentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
