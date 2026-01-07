<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChannelZones\ChannelZoneListParams\Page;
use Telnyx\ChannelZones\ChannelZoneListResponse;
use Telnyx\ChannelZones\ChannelZoneUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type PageShape from \Telnyx\ChannelZones\ChannelZoneListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ChannelZonesContract
{
    /**
     * @api
     *
     * @param string $channelZoneID Channel zone identifier
     * @param int $channels The number of reserved channels
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $channelZoneID,
        int $channels,
        RequestOptions|array|null $requestOptions = null,
    ): ChannelZoneUpdateResponse;

    /**
     * @api
     *
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<ChannelZoneListResponse>
     *
     * @throws APIException
     */
    public function list(
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null
    ): DefaultPagination;
}
