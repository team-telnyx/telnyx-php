<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChannelZones\ChannelZoneListParams;
use Telnyx\ChannelZones\ChannelZoneListResponse;
use Telnyx\ChannelZones\ChannelZoneUpdateParams;
use Telnyx\ChannelZones\ChannelZoneUpdateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ChannelZonesRawContract
{
    /**
     * @api
     *
     * @param string $channelZoneID Channel zone identifier
     * @param array<string,mixed>|ChannelZoneUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChannelZoneUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $channelZoneID,
        array|ChannelZoneUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ChannelZoneListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<ChannelZoneListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ChannelZoneListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
