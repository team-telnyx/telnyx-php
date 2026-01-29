<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\InboundChannels\InboundChannelListResponse;
use Telnyx\InboundChannels\InboundChannelUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface InboundChannelsContract
{
    /**
     * @api
     *
     * @param int $channels The new number of concurrent channels for the account
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $channels,
        RequestOptions|array|null $requestOptions = null
    ): InboundChannelUpdateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): InboundChannelListResponse;
}
