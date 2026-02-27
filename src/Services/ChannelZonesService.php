<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\ChannelZones\ChannelZoneListResponse;
use Telnyx\ChannelZones\ChannelZoneUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ChannelZonesContract;

/**
 * Voice Channels.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ChannelZonesService implements ChannelZonesContract
{
    /**
     * @api
     */
    public ChannelZonesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ChannelZonesRawService($client);
    }

    /**
     * @api
     *
     * Update the number of Voice Channels for the Non-US Zones. This allows your account to handle multiple simultaneous inbound calls to Non-US numbers. Use this endpoint to increase or decrease your capacity based on expected call volume.
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
    ): ChannelZoneUpdateResponse {
        $params = Util::removeNulls(['channels' => $channels]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($channelZoneID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the non-US voice channels for your account. voice channels allow you to use Channel Billing for calls to your Telnyx phone numbers. Please check the <a href="https://support.telnyx.com/en/articles/8428806-global-channel-billing">Telnyx Support Articles</a> section for full information and examples of how to utilize Channel Billing.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ChannelZoneListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
