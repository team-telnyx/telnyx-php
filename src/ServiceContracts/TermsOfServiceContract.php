<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TermsOfService\TermsOfServiceGetInfoResponse;
use Telnyx\TermsOfService\TermsOfServiceRetrieveInfoParams\ProductType;
use Telnyx\TermsOfService\TermsOfServiceStatusResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TermsOfServiceContract
{
    /**
     * @api
     *
     * @param ProductType|value-of<ProductType> $productType Optional product filter. Omit to return info for all products.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveInfo(
        ProductType|string|null $productType = null,
        RequestOptions|array|null $requestOptions = null,
    ): TermsOfServiceGetInfoResponse;

    /**
     * @api
     *
     * @param \Telnyx\TermsOfService\TermsOfServiceStatusParams\ProductType|value-of<\Telnyx\TermsOfService\TermsOfServiceStatusParams\ProductType> $productType Which product's ToS to check. Defaults to `branded_calling`; pass `number_reputation` to check the Number Reputation Terms of Service.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function status(
        \Telnyx\TermsOfService\TermsOfServiceStatusParams\ProductType|string|null $productType = null,
        RequestOptions|array|null $requestOptions = null,
    ): TermsOfServiceStatusResponse;
}
