<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc\Campaign;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface OsrRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function getAttributes(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
