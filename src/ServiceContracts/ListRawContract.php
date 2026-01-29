<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\List_\ListGetAllResponse;
use Telnyx\List_\ListGetByZoneResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ListRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListGetAllResponse>
     *
     * @throws APIException
     */
    public function retrieveAll(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $channelZoneID Channel zone identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListGetByZoneResponse>
     *
     * @throws APIException
     */
    public function retrieveByZone(
        string $channelZoneID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
