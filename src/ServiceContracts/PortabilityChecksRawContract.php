<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortabilityChecks\PortabilityCheckRunParams;
use Telnyx\PortabilityChecks\PortabilityCheckRunResponse;
use Telnyx\RequestOptions;

interface PortabilityChecksRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|PortabilityCheckRunParams $params
     *
     * @return BaseResponse<PortabilityCheckRunResponse>
     *
     * @throws APIException
     */
    public function run(
        array|PortabilityCheckRunParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
