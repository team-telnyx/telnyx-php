<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\TestSuites\TestSuiteListResponse;
use Telnyx\RequestOptions;

interface TestSuitesContract
{
    /**
     * @api
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): TestSuiteListResponse;
}
