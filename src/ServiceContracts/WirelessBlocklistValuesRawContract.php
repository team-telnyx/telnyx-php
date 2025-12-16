<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListParams;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse;

interface WirelessBlocklistValuesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|WirelessBlocklistValueListParams $params
     *
     * @return BaseResponse<WirelessBlocklistValueListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|WirelessBlocklistValueListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
