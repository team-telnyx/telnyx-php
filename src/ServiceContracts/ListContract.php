<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\List\ListGetAllResponse;
use Telnyx\List\ListGetByZoneResponse;
use Telnyx\RequestOptions;

interface ListContract
{
    /**
     * @api
     *
     * @return ListGetAllResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveAll(
        ?RequestOptions $requestOptions = null
    ): ListGetAllResponse;

    /**
     * @api
     *
     * @return ListGetAllResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveAllRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ListGetAllResponse;

    /**
     * @api
     *
     * @return ListGetByZoneResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveByZone(
        string $channelZoneID,
        ?RequestOptions $requestOptions = null
    ): ListGetByZoneResponse;

    /**
     * @api
     *
     * @return ListGetByZoneResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveByZoneRaw(
        string $channelZoneID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): ListGetByZoneResponse;
}
