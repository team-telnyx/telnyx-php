<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\InboundChannels\InboundChannelListResponse;
use Telnyx\InboundChannels\InboundChannelUpdateParams;
use Telnyx\InboundChannels\InboundChannelUpdateResponse;
use Telnyx\RequestOptions;

interface InboundChannelsContract
{
    /**
     * @api
     *
     * @param array<mixed>|InboundChannelUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        array|InboundChannelUpdateParams $params,
        ?RequestOptions $requestOptions = null,
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
