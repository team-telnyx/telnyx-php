<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListParams\Type;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse;

interface WirelessBlocklistValuesContract
{
    /**
     * @api
     *
     * @param Type|value-of<Type> $type The Wireless Blocklist type for which to list possible values (e.g., `country`, `mcc`, `plmn`).
     *
     * @return WirelessBlocklistValueListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $type,
        ?RequestOptions $requestOptions = null
    ): WirelessBlocklistValueListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return WirelessBlocklistValueListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): WirelessBlocklistValueListResponse;
}
