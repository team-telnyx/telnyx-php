<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\InboundChannels\InboundChannelListResponse;
use Telnyx\InboundChannels\InboundChannelUpdateParams;
use Telnyx\InboundChannels\InboundChannelUpdateResponse;
use Telnyx\RequestOptions;

interface InboundChannelsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|InboundChannelUpdateParams $params
     *
     * @return BaseResponse<InboundChannelUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        array|InboundChannelUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<InboundChannelListResponse>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse;
}
