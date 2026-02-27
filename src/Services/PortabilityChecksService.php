<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\PortabilityChecks\PortabilityCheckRunResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortabilityChecksContract;

/**
 * Determining portability of phone numbers.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PortabilityChecksService implements PortabilityChecksContract
{
    /**
     * @api
     */
    public PortabilityChecksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PortabilityChecksRawService($client);
    }

    /**
     * @api
     *
     * Runs a portability check, returning the results immediately.
     *
     * @param list<string> $phoneNumbers The list of +E.164 formatted phone numbers to check for portability
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function run(
        ?array $phoneNumbers = null,
        RequestOptions|array|null $requestOptions = null
    ): PortabilityCheckRunResponse {
        $params = Util::removeNulls(['phoneNumbers' => $phoneNumbers]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->run(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
