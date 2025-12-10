<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\InboundChannels\InboundChannelListResponse;
use Telnyx\InboundChannels\InboundChannelUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InboundChannelsContract;

final class InboundChannelsService implements InboundChannelsContract
{
    /**
     * @api
     */
    public InboundChannelsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new InboundChannelsRawService($client);
    }

    /**
     * @api
     *
     * Update the number of Voice Channels for the US Zone. This allows your account to handle multiple simultaneous inbound calls to US numbers. Use this endpoint to increase or decrease your capacity based on expected call volume.
     *
     * @param int $channels The new number of concurrent channels for the account
     *
     * @throws APIException
     */
    public function update(
        int $channels,
        ?RequestOptions $requestOptions = null
    ): InboundChannelUpdateResponse {
        $params = Util::removeNulls(['channels' => $channels]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the US Zone voice channels for your account. voice channels allows you to use Channel Billing for calls to your Telnyx phone numbers. Please check the <a href="https://support.telnyx.com/en/articles/8428806-global-channel-billing">Telnyx Support Articles</a> section for full information and examples of how to utilize Channel Billing.
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): InboundChannelListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
