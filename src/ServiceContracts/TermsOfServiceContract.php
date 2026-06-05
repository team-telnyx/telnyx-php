<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TermsOfService\TermsOfServiceStatusParams\ProductType;
use Telnyx\TermsOfService\TermsOfServiceStatusResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TermsOfServiceContract
{
    /**
     * @api
     *
     * @param ProductType|value-of<ProductType> $productType Which product's ToS to check. Defaults to `branded_calling`; pass `number_reputation` to check the Number Reputation Terms of Service.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function status(
        ProductType|string|null $productType = null,
        RequestOptions|array|null $requestOptions = null,
    ): TermsOfServiceStatusResponse;
}
