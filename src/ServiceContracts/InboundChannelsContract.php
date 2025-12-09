<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\InboundChannels\InboundChannelListResponse;
use Telnyx\InboundChannels\InboundChannelUpdateResponse;
use Telnyx\RequestOptions;

interface InboundChannelsContract
{
    /**
     * @api
     *
     * @param int $channels The new number of concurrent channels for the account
     *
     * @throws APIException
     */
    public function update(
        int $channels,
        ?RequestOptions $requestOptions = null
    ): InboundChannelUpdateResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): InboundChannelListResponse;
}
