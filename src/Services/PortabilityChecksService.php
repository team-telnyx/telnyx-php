<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PortabilityChecks\PortabilityCheckRunParams;
use Telnyx\PortabilityChecks\PortabilityCheckRunResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortabilityChecksContract;

use const Telnyx\Core\OMIT as omit;

final class PortabilityChecksService implements PortabilityChecksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Runs a portability check, returning the results immediately.
     *
     * @param list<string> $phoneNumbers The list of +E.164 formatted phone numbers to check for portability
     *
     * @return PortabilityCheckRunResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function run(
        $phoneNumbers = omit,
        ?RequestOptions $requestOptions = null
    ): PortabilityCheckRunResponse {
        $params = ['phoneNumbers' => $phoneNumbers];

        return $this->runRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PortabilityCheckRunResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function runRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortabilityCheckRunResponse {
        [$parsed, $options] = PortabilityCheckRunParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'portability_checks',
            body: (object) $parsed,
            options: $options,
            convert: PortabilityCheckRunResponse::class,
        );
    }
}
