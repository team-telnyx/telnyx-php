<?php

declare(strict_types=1);

namespace Telnyx\Services\TermsOfService;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TermsOfService\NumberReputationContract;
use Telnyx\TermsOfService\Agreements\TosAgreementWrapped;

/**
 * Accept and review the Branded Calling and Phone Number Reputation terms of service.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NumberReputationService implements NumberReputationContract
{
    /**
     * @api
     */
    public NumberReputationRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NumberReputationRawService($client);
    }

    /**
     * @api
     *
     * Records the authenticated user's agreement to the current Phone Number Reputation ToS. No body required. Idempotent.
     *
     * Prerequisite for using any of the `/v2/.../reputation/*` endpoints.
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
