<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests\Schedules;

use Telnyx\Client;
use Telnyx\ServiceContracts\AI\Tests\Schedules\V1RawContract;

final class V1RawService implements V1RawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
