<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Pricing;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Pricing\Products\ProductGetResponse;
use Telnyx\Pricing\Products\ProductListParams;
use Telnyx\Pricing\Products\ProductListResponse;
use Telnyx\Pricing\Products\ProductRetrieveParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ProductsRawContract
{
    /**
     * @api
     *
     * @param string $slug product slug from the catalog listing
     * @param array<string,mixed>|ProductRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProductGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $slug,
        array|ProductRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ProductListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ProductListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ProductListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
