<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\InventoryCoverage\InventoryCoverageListParams;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InventoryCoverageContract;

use const Telnyx\Core\OMIT as omit;

final class InventoryCoverageService implements InventoryCoverageContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an inventory coverage request. If locality, npa or national_destination_code is used in groupBy, and no region or locality filters are used, the whole paginated set is returned.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[npa], filter[nxx], filter[administrative_area], filter[phone_number_type], filter[country_code], filter[count], filter[features], filter[groupBy]
     *
     * @return InventoryCoverageListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): InventoryCoverageListResponse {
        [$parsed, $options] = InventoryCoverageListParams::parseRequest(
            ['filter' => $filter],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'inventory_coverage',
            query: $parsed,
            options: $options,
            convert: InventoryCoverageListResponse::class,
        );
    }
}
