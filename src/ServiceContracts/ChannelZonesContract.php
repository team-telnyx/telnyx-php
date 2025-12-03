<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChannelZones\ChannelZoneListParams;
use Telnyx\ChannelZones\ChannelZoneListResponse;
use Telnyx\ChannelZones\ChannelZoneUpdateParams;
use Telnyx\ChannelZones\ChannelZoneUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

interface ChannelZonesContract
{
    /**
     * @api
     *
     * @param array<mixed>|ChannelZoneUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $channelZoneID,
        array|ChannelZoneUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ChannelZoneUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|ChannelZoneListParams $params
     *
     * @return DefaultPagination<ChannelZoneListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ChannelZoneListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
