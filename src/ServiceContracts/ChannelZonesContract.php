<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChannelZones\GcbChannelZone;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ChannelZonesContract
{
    /**
     * @api
     *
     * @param string $channelZoneID Channel zone identifier
     * @param int $channels The number of reserved channels
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $channelZoneID,
        int $channels,
        RequestOptions|array|null $requestOptions = null,
    ): GcbChannelZone;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<GcbChannelZone>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
