<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Compute\ComputeGetResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ComputeRawContract
{
    /**
     * @api
     *
     * @param string $id Actor type ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ComputeGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
