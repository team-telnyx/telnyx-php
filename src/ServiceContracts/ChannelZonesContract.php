<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChannelZones\ChannelZoneListParams\Page;
use Telnyx\ChannelZones\ChannelZoneListResponse;
use Telnyx\ChannelZones\ChannelZoneUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
     */
    public function update(
        string $channelZoneID,
        $channels,
        ?RequestOptions $requestOptions = null
    ): ChannelZoneUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ChannelZoneUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $channelZoneID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ChannelZoneUpdateResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return ChannelZoneListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ChannelZoneListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ChannelZoneListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ChannelZoneListResponse;
}
