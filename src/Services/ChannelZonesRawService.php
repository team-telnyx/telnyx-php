<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\ChannelZones\ChannelZoneListParams;
use Telnyx\ChannelZones\ChannelZoneListResponse;
use Telnyx\ChannelZones\ChannelZoneUpdateParams;
use Telnyx\ChannelZones\ChannelZoneUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ChannelZonesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ChannelZonesRawService implements ChannelZonesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update the number of Voice Channels for the Non-US Zones. This allows your account to handle multiple simultaneous inbound calls to Non-US numbers. Use this endpoint to increase or decrease your capacity based on expected call volume.
     *
     * @param string $channelZoneID Channel zone identifier
     * @param array{channels: int}|ChannelZoneUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChannelZoneUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $channelZoneID,
        array|ChannelZoneUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChannelZoneUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{pageNumber?: int, pageSize?: int}|ChannelZoneListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ChannelZoneListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ChannelZoneListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChannelZoneListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'channel_zones',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: ChannelZoneListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
