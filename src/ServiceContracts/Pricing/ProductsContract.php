<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Pricing;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Pricing\Products\ProductGetResponse;
use Telnyx\Pricing\Products\ProductListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ProductsContract
{
    /**
     * @api
     *
     * @param string $slug product slug from the catalog listing
     * @param int $pageNumber page number (1-based)
     * @param int $pageSize number of items per page (max 100)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $slug,
        ?string $filterCountryISO = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): ProductGetResponse;

    /**
     * @api
     *
     * @param int $pageNumber page number (1-based)
     * @param int $pageSize number of items per page (max 100)
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ProductListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
