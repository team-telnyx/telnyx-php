<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RequestOptions;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListParams\Type;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse;

interface WirelessBlocklistValuesContract
{
    /**
     * @api
     *
     * @param Type|value-of<Type> $type The Wireless Blocklist type for which to list possible values (e.g., `country`, `mcc`, `plmn`).
     */
    public function list(
        $type,
        ?RequestOptions $requestOptions = null
    ): WirelessBlocklistValueListResponse;
}
