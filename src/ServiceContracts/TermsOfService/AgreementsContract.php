<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\TermsOfService;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\TermsOfService\Agreements\AgreementGetResponse;
use Telnyx\TermsOfService\Agreements\AgreementListParams\ProductType;
use Telnyx\TermsOfService\Agreements\AgreementListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AgreementsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $agreementID,
        RequestOptions|array|null $requestOptions = null
    ): AgreementGetResponse;

    /**
     * @api
     *
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Maximum 250; values above are clamped to 250.
     * @param ProductType|value-of<ProductType> $productType Optional filter. Omit to list the user's agreements for **every** product (branded_calling and number_reputation); pass a value to return only that product's agreements.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<AgreementListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        ProductType|string|null $productType = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
