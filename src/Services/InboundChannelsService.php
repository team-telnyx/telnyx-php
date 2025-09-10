<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\InboundChannels\InboundChannelListResponse;
use Telnyx\InboundChannels\InboundChannelUpdateParams;
use Telnyx\InboundChannels\InboundChannelUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InboundChannelsContract;

final class InboundChannelsService implements InboundChannelsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update the number of Voice Channels for the US Zone. This allows your account to handle multiple simultaneous inbound calls to US numbers. Use this endpoint to increase or decrease your capacity based on expected call volume.
     *
     * @param int $channels The new number of concurrent channels for the account
     */
    public function update(
        $channels,
        ?RequestOptions $requestOptions = null
    ): InboundChannelUpdateResponse {
        [$parsed, $options] = InboundChannelUpdateParams::parseRequest(
            ['channels' => $channels],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: 'inbound_channels',
            body: (object) $parsed,
            options: $options,
            convert: InboundChannelUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the US Zone voice channels for your account. voice channels allows you to use Channel Billing for calls to your Telnyx phone numbers. Please check the <a href="https://support.telnyx.com/en/articles/8428806-global-channel-billing">Telnyx Support Articles</a> section for full information and examples of how to utilize Channel Billing.
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): InboundChannelListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'inbound_channels',
            options: $requestOptions,
            convert: InboundChannelListResponse::class,
        );
    }
}
