<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChannelZones\ChannelZoneListParams\Page;
use Telnyx\ChannelZones\ChannelZoneListResponse;
use Telnyx\ChannelZones\ChannelZoneUpdateResponse;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ChannelZonesContract
{
    /**
     * @api
     *
     * @param int $channels The number of reserved channels
     *
     * @return ChannelZoneUpdateResponse<HasRawResponse>
     */
    public function update(
        string $channelZoneID,
        $channels,
        ?RequestOptions $requestOptions = null
    ): ChannelZoneUpdateResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return ChannelZoneListResponse<HasRawResponse>
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ChannelZoneListResponse;
}
