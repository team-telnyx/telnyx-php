<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListParams\Type;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse;

interface WirelessBlocklistValuesContract
{
    /**
     * @api
     *
     * @param 'country'|'mcc'|'plmn'|Type $type The Wireless Blocklist type for which to list possible values (e.g., `country`, `mcc`, `plmn`).
     *
     * @throws APIException
     */
    public function list(
        string|Type $type,
        ?RequestOptions $requestOptions = null
    ): WirelessBlocklistValueListResponse;
}
