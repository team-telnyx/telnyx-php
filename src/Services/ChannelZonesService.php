<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\ChannelZones\ChannelZoneListParams;
use Telnyx\ChannelZones\ChannelZoneListParams\Page;
use Telnyx\ChannelZones\ChannelZoneListResponse;
use Telnyx\ChannelZones\ChannelZoneUpdateParams;
use Telnyx\ChannelZones\ChannelZoneUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ChannelZonesContract;

use const Telnyx\Core\OMIT as omit;

final class ChannelZonesService implements ChannelZonesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update the number of Voice Channels for the Non-US Zones. This allows your account to handle multiple simultaneous inbound calls to Non-US numbers. Use this endpoint to increase or decrease your capacity based on expected call volume.
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
    ): ChannelZoneUpdateResponse {
        $params = ['channels' => $channels];

        return $this->updateRaw($channelZoneID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): ChannelZoneUpdateResponse {
        [$parsed, $options] = ChannelZoneUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['channel_zones/%1$s', $channelZoneID],
            body: (object) $parsed,
            options: $options,
            convert: ChannelZoneUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the non-US voice channels for your account. voice channels allow you to use Channel Billing for calls to your Telnyx phone numbers. Please check the <a href="https://support.telnyx.com/en/articles/8428806-global-channel-billing">Telnyx Support Articles</a> section for full information and examples of how to utilize Channel Billing.
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
    ): ChannelZoneListResponse {
        $params = ['page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): ChannelZoneListResponse {
        [$parsed, $options] = ChannelZoneListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'channel_zones',
            query: $parsed,
            options: $options,
            convert: ChannelZoneListResponse::class,
        );
    }
}
