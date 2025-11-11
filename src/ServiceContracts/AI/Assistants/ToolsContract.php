<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\Tools\ToolTestParams;
use Telnyx\AI\Assistants\Tools\ToolTestResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ToolsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ToolTestParams $params
     *
     * @throws APIException
     */
    public function test(
        string $toolID,
        array|ToolTestParams $params,
        ?RequestOptions $requestOptions = null,
    ): ToolTestResponse;
}
