<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\TestSuites\TestSuiteListResponse;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

interface TestSuitesContract
{
    /**
     * @api
     *
     * @return TestSuiteListResponse<HasRawResponse>
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): TestSuiteListResponse;
}
