<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse;
use Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams;
use Telnyx\RequestOptions;

interface GlobalIPUsageRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|GlobalIPUsageRetrieveParams $params
     *
     * @return BaseResponse<GlobalIPUsageGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|GlobalIPUsageRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
