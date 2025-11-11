<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse;
use Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams;
use Telnyx\RequestOptions;

interface GlobalIPUsageContract
{
    /**
     * @api
     *
     * @param array<mixed>|GlobalIPUsageRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|GlobalIPUsageRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPUsageGetResponse;
}
