<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\List_\ListGetAllResponse;
use Telnyx\List_\ListGetByZoneResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ListContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveAll(
        RequestOptions|array|null $requestOptions = null
    ): ListGetAllResponse;

    /**
     * @api
     *
     * @param string $channelZoneID Channel zone identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveByZone(
        string $channelZoneID,
        RequestOptions|array|null $requestOptions = null
    ): ListGetByZoneResponse;
}
