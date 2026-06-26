<?php

declare(strict_types=1);

namespace Telnyx\Services\TermsOfService;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TermsOfService\BrandedCallingRawContract;
use Telnyx\TermsOfService\Agreements\TosAgreementWrapped;

/**
 * Accept and review the Branded Calling and Phone Number Reputation terms of service.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BrandedCallingRawService implements BrandedCallingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Records the authenticated user's agreement to the current Branded Calling ToS. No body required. Idempotent - re-calling after agreement is a no-op and returns the existing agreement.
     *
     * This is a prerequisite for activating Branded Calling on any enterprise (`POST /enterprises/{id}/branded_calling`); without an agreement, activation returns `403`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TosAgreementWrapped>
     *
     * @throws APIException
     */
    public function agree(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'terms_of_service/branded_calling/agree',
            options: $requestOptions,
            convert: TosAgreementWrapped::class,
        );
    }
}
