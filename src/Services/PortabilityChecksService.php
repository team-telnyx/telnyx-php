<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
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
     */
    public function run(
        $phoneNumbers = omit,
        ?RequestOptions $requestOptions = null
    ): PortabilityCheckRunResponse {
        [$parsed, $options] = PortabilityCheckRunParams::parseRequest(
            ['phoneNumbers' => $phoneNumbers],
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
