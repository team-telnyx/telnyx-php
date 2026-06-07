<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TermsOfServiceRawContract;
use Telnyx\TermsOfService\TermsOfServiceGetInfoResponse;
use Telnyx\TermsOfService\TermsOfServiceRetrieveInfoParams;
use Telnyx\TermsOfService\TermsOfServiceRetrieveInfoParams\ProductType;
use Telnyx\TermsOfService\TermsOfServiceStatusParams;
use Telnyx\TermsOfService\TermsOfServiceStatusResponse;

/**
 * Accept and review the Branded Calling and Phone Number Reputation terms of service.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TermsOfServiceRawService implements TermsOfServiceRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the available Terms of Service agreements (product, current version, terms URL, effective date). Omit `product_type` to return all products; pass it to scope to one.
     *
     * @param array{
     *   productType?: ProductType|value-of<ProductType>
     * }|TermsOfServiceRetrieveInfoParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TermsOfServiceGetInfoResponse>
     *
     * @throws APIException
     */
    public function retrieveInfo(
        array|TermsOfServiceRetrieveInfoParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TermsOfServiceRetrieveInfoParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'terms_of_service/info',
            query: Util::array_transform_keys(
                $parsed,
                ['productType' => 'product_type']
            ),
            options: $options,
            convert: TermsOfServiceGetInfoResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns whether the authenticated user has agreed to the current Terms of Service for the product given by `product_type`. Used during onboarding to decide whether to prompt the user with the ToS dialog before continuing.
     *
     * `agreement_required: true` means the user has not yet agreed (or has agreed to an outdated version) and must agree before using that product's endpoints.
     *
     * @param array{
     *   productType?: TermsOfServiceStatusParams\ProductType|value-of<TermsOfServiceStatusParams\ProductType>,
     * }|TermsOfServiceStatusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TermsOfServiceStatusResponse>
     *
     * @throws APIException
     */
    public function status(
        array|TermsOfServiceStatusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TermsOfServiceStatusParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'terms_of_service/status',
            query: Util::array_transform_keys(
                $parsed,
                ['productType' => 'product_type']
            ),
            options: $options,
            convert: TermsOfServiceStatusResponse::class,
        );
    }
}
