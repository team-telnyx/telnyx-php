<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\List_\ListGetAllResponse;
use Telnyx\List_\ListGetByZoneResponse;
use Telnyx\RequestOptions;

interface ListRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<ListGetAllResponse>
     *
     * @throws APIException
     */
    public function retrieveAll(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $channelZoneID Channel zone identifier
     *
     * @return BaseResponse<ListGetByZoneResponse>
     *
     * @throws APIException
     */
    public function retrieveByZone(
        string $channelZoneID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
