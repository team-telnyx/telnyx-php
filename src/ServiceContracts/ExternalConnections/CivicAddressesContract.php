<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\ExternalConnections\CivicAddresses\CivicAddressGetResponse;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListParams\Filter;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface CivicAddressesContract
{
    /**
     * @api
     *
     * @param string $id
     */
    public function retrieve(
        string $addressID,
        $id,
        ?RequestOptions $requestOptions = null
    ): CivicAddressGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Filter parameter for civic addresses (deepObject style). Supports filtering by country.
     */
    public function list(
        string $id,
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): CivicAddressListResponse;
}
