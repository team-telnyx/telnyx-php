<?php

declare(strict_types=1);

namespace Telnyx\Services\Campaign;

use Telnyx\Client;
use Telnyx\ServiceContracts\Campaign\UsecaseRawContract;

final class UsecaseRawService implements UsecaseRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
