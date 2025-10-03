<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Regions\RegionListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\RegionsContract;

final class RegionsService implements RegionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all regions and the interfaces that region supports
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): RegionListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'regions',
            options: $requestOptions,
            convert: RegionListResponse::class,
        );
    }
}
