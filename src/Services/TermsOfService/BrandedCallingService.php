<?php

declare(strict_types=1);

namespace Telnyx\Services\TermsOfService;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TermsOfService\BrandedCallingContract;
use Telnyx\TermsOfService\Agreements\TosAgreementWrapped;

/**
 * Accept and review the Branded Calling and Phone Number Reputation terms of service.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BrandedCallingService implements BrandedCallingContract
{
    /**
     * @api
     */
    public BrandedCallingRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BrandedCallingRawService($client);
    }

    /**
     * @api
     *
     * Records the authenticated user's agreement to the current Branded Calling ToS. No body required. Idempotent - re-calling after agreement is a no-op and returns the existing agreement.
     *
     * This is a prerequisite for activating Branded Calling on any enterprise (`POST /enterprises/{id}/branded_calling`); without an agreement, activation returns `403`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function agree(
        RequestOptions|array|null $requestOptions = null
    ): TosAgreementWrapped {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->agree(requestOptions: $requestOptions);

        return $response->parse();
    }
}
