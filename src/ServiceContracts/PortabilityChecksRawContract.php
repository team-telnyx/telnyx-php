<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortabilityChecks\PortabilityCheckRunParams;
use Telnyx\PortabilityChecks\PortabilityCheckRunResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PortabilityChecksRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PortabilityCheckRunParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortabilityCheckRunResponse>
     *
     * @throws APIException
     */
    public function run(
        array|PortabilityCheckRunParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
