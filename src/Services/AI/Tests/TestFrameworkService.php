<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests;

use Telnyx\Client;
use Telnyx\ServiceContracts\AI\Tests\TestFrameworkContract;
use Telnyx\Services\AI\Tests\TestFramework\V1Service;

final class TestFrameworkService implements TestFrameworkContract
{
    /**
     * @api
     */
    public TestFrameworkRawService $raw;

    /**
     * @api
     */
    public V1Service $v1;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TestFrameworkRawService($client);
        $this->v1 = new V1Service($client);
    }
}
