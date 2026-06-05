<?php

declare(strict_types=1);

namespace Telnyx\Services\TermsOfService;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TermsOfService\AgreementsContract;
use Telnyx\TermsOfService\Agreements\AgreementGetResponse;
use Telnyx\TermsOfService\Agreements\AgreementListParams\ProductType;
use Telnyx\TermsOfService\Agreements\AgreementListResponse;

/**
 * Accept and review the Branded Calling and Phone Number Reputation terms of service.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AgreementsService implements AgreementsContract
{
    /**
     * @api
     */
    public AgreementsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AgreementsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a single ToS agreement record. Returns `404` if the agreement does not exist or does not belong to the authenticated user.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $agreementID,
        RequestOptions|array|null $requestOptions = null
    ): AgreementGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($agreementID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the Terms of Service agreements the authenticated user has on file. Each entry records the version agreed to and when. Most users only have one agreement per product, but if the ToS is updated and the user re-agrees a new entry is added.
     *
     * Results are paginated with the standard `page[number]` / `page[size]` parameters; the response uses the standard `{data, meta}` JSON:API envelope.
     *
     * By default this returns agreements for **all** products the user has agreed to (including Branded Calling). Pass the `product_type` query parameter to scope the result to a single product.
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'productType' => $productType,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
