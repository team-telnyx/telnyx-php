<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\InventoryCoverage\InventoryCoverageListParams;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InventoryCoverageRawContract;

/**
 * Inventory Level.
 *
 * @phpstan-import-type FilterShape from \Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class InventoryCoverageRawService implements InventoryCoverageRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an inventory coverage request. If locality, npa or national_destination_code is used in groupBy, and no region or locality filters are used, the whole paginated set is returned.
     *
     * @param array{filter?: Filter|FilterShape}|InventoryCoverageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InventoryCoverageListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|InventoryCoverageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InventoryCoverageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'inventory_coverage',
            query: $parsed,
            options: $options,
            convert: InventoryCoverageListResponse::class,
        );
    }
}
