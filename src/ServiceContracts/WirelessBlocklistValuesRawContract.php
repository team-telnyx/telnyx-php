<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListParams;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface WirelessBlocklistValuesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|WirelessBlocklistValueListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WirelessBlocklistValueListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|WirelessBlocklistValueListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
