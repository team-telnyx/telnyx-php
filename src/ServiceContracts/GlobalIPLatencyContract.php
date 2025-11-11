<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse;
use Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams;
use Telnyx\RequestOptions;

interface GlobalIPLatencyContract
{
    /**
     * @api
     *
     * @param array<mixed>|GlobalIPLatencyRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|GlobalIPLatencyRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPLatencyGetResponse;
}
