<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\InboundChannels\InboundChannelListResponse;
use Telnyx\InboundChannels\InboundChannelUpdateParams;
use Telnyx\InboundChannels\InboundChannelUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface InboundChannelsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|InboundChannelUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboundChannelUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        array|InboundChannelUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboundChannelListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
