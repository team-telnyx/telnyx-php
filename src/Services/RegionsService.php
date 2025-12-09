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
     * @api
     */
    public RegionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RegionsRawService($client);
    }

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
