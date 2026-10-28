<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests;

use Telnyx\Client;
use Telnyx\ServiceContracts\AI\Tests\TestFrameworkRawContract;

final class TestFrameworkRawService implements TestFrameworkRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
