<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListParams;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse;

interface WirelessBlocklistValuesContract
{
    /**
     * @api
     *
     * @param array<mixed>|WirelessBlocklistValueListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|WirelessBlocklistValueListParams $params,
        ?RequestOptions $requestOptions = null,
    ): WirelessBlocklistValueListResponse;
}
