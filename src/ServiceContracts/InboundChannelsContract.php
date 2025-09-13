<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     * @return InboundChannelUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        $channels,
        ?RequestOptions $requestOptions = null
    ): InboundChannelUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return InboundChannelUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): InboundChannelUpdateResponse;

    /**
     * @api
     *
     * @return InboundChannelListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): InboundChannelListResponse;

    /**
     * @api
     *
     * @return InboundChannelListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): InboundChannelListResponse;
}
