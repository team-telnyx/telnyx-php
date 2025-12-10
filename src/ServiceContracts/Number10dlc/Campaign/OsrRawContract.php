<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc\Campaign;

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
    public function retrieveAttributes(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
