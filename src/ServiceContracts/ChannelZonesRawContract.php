<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChannelZones\ChannelZoneListParams;
use Telnyx\ChannelZones\ChannelZoneListResponse;
use Telnyx\ChannelZones\ChannelZoneUpdateParams;
use Telnyx\ChannelZones\ChannelZoneUpdateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

interface ChannelZonesRawContract
{
    /**
     * @api
     *
     * @param string $channelZoneID Channel zone identifier
     * @param array<mixed>|ChannelZoneUpdateParams $params
     *
     * @return BaseResponse<ChannelZoneUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $channelZoneID,
        array|ChannelZoneUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ChannelZoneListParams $params
     *
     * @return BaseResponse<DefaultPagination<ChannelZoneListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ChannelZoneListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
