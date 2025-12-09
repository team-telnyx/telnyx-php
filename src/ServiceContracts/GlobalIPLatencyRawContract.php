<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse;
use Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams;
use Telnyx\RequestOptions;

interface GlobalIPLatencyRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|GlobalIPLatencyRetrieveParams $params
     *
     * @return BaseResponse<GlobalIPLatencyGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|GlobalIPLatencyRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
