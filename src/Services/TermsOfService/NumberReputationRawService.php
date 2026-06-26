<?php

declare(strict_types=1);

namespace Telnyx\Services\TermsOfService;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TermsOfService\NumberReputationRawContract;
use Telnyx\TermsOfService\NumberReputation\NumberReputationAgreeResponse;

/**
 * Accept and review the Branded Calling and Phone Number Reputation terms of service.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NumberReputationRawService implements NumberReputationRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Records the authenticated user's agreement to the current Phone Number Reputation ToS. No body required. Idempotent.
     *
     * Prerequisite for using any of the `/v2/.../reputation/*` endpoints.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberReputationAgreeResponse>
     *
     * @throws APIException
     */
    public function agree(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'terms_of_service/number_reputation/agree',
            options: $requestOptions,
            convert: NumberReputationAgreeResponse::class,
        );
    }
}
