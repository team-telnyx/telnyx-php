<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TermsOfService\Agreements\TosProductType;
use Telnyx\TermsOfService\TermsOfServiceGetInfoResponse;
use Telnyx\TermsOfService\TermsOfServiceGetStatusResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TermsOfServiceContract
{
    /**
     * @api
     *
     * @param TosProductType|value-of<TosProductType> $productType Optional product filter. Omit to return info for all products.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveInfo(
        TosProductType|string|null $productType = null,
        RequestOptions|array|null $requestOptions = null,
    ): TermsOfServiceGetInfoResponse;

    /**
     * @api
     *
     * @param TosProductType|value-of<TosProductType> $productType Which product's ToS to check. Defaults to `branded_calling`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveStatus(
        TosProductType|string|null $productType = null,
        RequestOptions|array|null $requestOptions = null,
    ): TermsOfServiceGetStatusResponse;
}
