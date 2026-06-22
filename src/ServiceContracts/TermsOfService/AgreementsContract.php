<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\TermsOfService;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\TermsOfService\Agreements\TosAgreement;
use Telnyx\TermsOfService\Agreements\TosAgreementWrapped;
use Telnyx\TermsOfService\Agreements\TosProductType;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AgreementsContract
{
    /**
     * @api
     *
     * @param string $agreementID unique identifier of the agreement
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $agreementID,
        RequestOptions|array|null $requestOptions = null
    ): TosAgreementWrapped;

    /**
     * @api
     *
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Maximum 250; values above are clamped to 250.
     * @param TosProductType|value-of<TosProductType> $productType Optional filter. Omit to list the user's agreements for **every** product (branded_calling and number_reputation); pass a value to return only that product's agreements.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<TosAgreement>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        TosProductType|string|null $productType = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
