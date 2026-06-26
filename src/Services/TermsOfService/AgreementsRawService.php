<?php

declare(strict_types=1);

namespace Telnyx\Services\TermsOfService;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TermsOfService\AgreementsRawContract;
use Telnyx\TermsOfService\Agreements\AgreementGetResponse;
use Telnyx\TermsOfService\Agreements\AgreementListParams;
use Telnyx\TermsOfService\Agreements\AgreementListParams\ProductType;
use Telnyx\TermsOfService\Agreements\AgreementListResponse;

/**
 * Accept and review the Branded Calling and Phone Number Reputation terms of service.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AgreementsRawService implements AgreementsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a single ToS agreement record. Returns `404` if the agreement does not exist or does not belong to the authenticated user.
     *
     * @param string $agreementID unique identifier of the agreement
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgreementGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $agreementID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['terms_of_service/agreements/%1$s', $agreementID],
            options: $requestOptions,
            convert: AgreementGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the Terms of Service agreements the authenticated user has on file. Each entry records the version agreed to and when. Most users only have one agreement per product, but if the ToS is updated and the user re-agrees a new entry is added.
     *
     * Results are paginated with the standard `page[number]` / `page[size]` parameters; the response uses the standard `{data, meta}` JSON:API envelope.
     *
     * By default this returns agreements for **all** products the user has agreed to. Pass the `product_type` query parameter to scope the result to a single product.
     *
     * @param array{
     *   pageNumber?: int,
     *   pageSize?: int,
     *   productType?: ProductType|value-of<ProductType>,
     * }|AgreementListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<AgreementListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|AgreementListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AgreementListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'terms_of_service/agreements',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'productType' => 'product_type',
                ],
            ),
            options: $options,
            convert: AgreementListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
