<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\Tools\ToolTestParams;
use Telnyx\AI\Assistants\Tools\ToolTestResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ToolsRawContract
{
    /**
     * @api
     *
     * @param string $toolID Path param:
     * @param array<string,mixed>|ToolTestParams $params
     *
     * @return BaseResponse<ToolTestResponse>
     *
     * @throws APIException
     */
    public function test(
        string $toolID,
        array|ToolTestParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
