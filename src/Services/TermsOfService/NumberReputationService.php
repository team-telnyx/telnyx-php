<?php

declare(strict_types=1);

namespace Telnyx\Services\TermsOfService;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TermsOfService\NumberReputationContract;

/**
 * Terms of Service agreement endpoints.
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
     * Accept the Terms of Service for the Number Reputation product. Must be called before using Number Reputation endpoints.
     *
     * Returns `400` with error code `10015` if the user has already agreed to the current ToS version.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function agree(
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->agree(requestOptions: $requestOptions);

        return $response->parse();
    }
}
