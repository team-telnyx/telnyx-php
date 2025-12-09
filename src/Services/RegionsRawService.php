<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Regions\RegionListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\RegionsRawContract;

final class RegionsRawService implements RegionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all regions and the interfaces that region supports
     *
     * @return BaseResponse<RegionListResponse>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'regions',
            options: $requestOptions,
            convert: RegionListResponse::class,
        );
    }
}
