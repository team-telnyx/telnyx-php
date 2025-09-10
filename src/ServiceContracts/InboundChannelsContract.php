<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\InboundChannels\InboundChannelListResponse;
use Telnyx\InboundChannels\InboundChannelUpdateResponse;
use Telnyx\RequestOptions;

interface InboundChannelsContract
{
    /**
     * @api
     *
     * @param int $channels The new number of concurrent channels for the account
     */
    public function update(
        $channels,
        ?RequestOptions $requestOptions = null
    ): InboundChannelUpdateResponse;

    /**
     * @api
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): InboundChannelListResponse;
}
