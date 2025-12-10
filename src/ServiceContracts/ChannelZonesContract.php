<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChannelZones\ChannelZoneListResponse;
use Telnyx\ChannelZones\ChannelZoneUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ChannelZonesContract
{
    /**
     * @api
     *
     * @param string $channelZoneID Channel zone identifier
     * @param int $channels The number of reserved channels
     *
     * @throws APIException
     */
    public function update(
        string $channelZoneID,
        int $channels,
        ?RequestOptions $requestOptions = null,
    ): ChannelZoneUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): ChannelZoneListResponse;
}
