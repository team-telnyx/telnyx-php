<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TermsOfServiceRawContract;
use Telnyx\TermsOfService\TermsOfServiceStatusParams;
use Telnyx\TermsOfService\TermsOfServiceStatusParams\ProductType;
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
     * Returns whether the authenticated user has agreed to the current Number Reputation Terms of Service. Used during onboarding to decide whether to prompt the user with the ToS dialog before continuing.
     *
     * The `agreement_required: true` value means the user has not yet agreed (or has agreed to an outdated version) and must call `POST /terms_of_service/number_reputation/agree` before they can use the Number Reputation endpoints on an enterprise.
     *
     * @param array{
     *   productType?: ProductType|value-of<ProductType>
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
