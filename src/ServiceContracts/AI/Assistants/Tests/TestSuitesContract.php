<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\TestSuites\TestSuiteListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface TestSuitesContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): TestSuiteListResponse;
}
