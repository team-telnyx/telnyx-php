<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc\Campaign;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface OsrRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function getAttributes(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
