<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Compute\ComputeGetResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ComputeContract
{
    /**
     * @api
     *
     * @param string $id Actor type ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ComputeGetResponse;
}
